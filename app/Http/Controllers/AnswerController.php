<?php

namespace App\Http\Controllers;

use App\Src\Answer\AnswerRepository;
use App\Src\Educator\Educator;
use App\Src\Notification\NotificationRepository;
use App\Src\Question\QuestionRepository;
use App\Src\Student\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Route;

class AnswerController extends Controller
{
    /**
     * @var AnswerRepository
     */
    private $answerRepository;
    /**
     * @var QuestionRepository
     */
    private $questionRepository;
    /**
     * @var NotificationRepository
     */
    private $notificationRepository;

    /**
     * @param AnswerRepository $answerRepository
     * @param QuestionRepository $questionRepository
     * @param NotificationRepository $notificationRepository
     */
    public function __construct(AnswerRepository $answerRepository, QuestionRepository $questionRepository, NotificationRepository $notificationRepository)
    {
        $this->middleware('auth');
        $this->answerRepository = $answerRepository;
        $this->questionRepository = $questionRepository;
        $this->notificationRepository = $notificationRepository;
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function createAnswer($id)
    {
        $user = Auth::user();

        $question = $this->questionRepository->model->find($id);

        // Check IF the Current User Can Answer This Question
        try {
            $user->canAnswer($question);
        } catch (\Exception $e) {
            return redirect()->back()->with('warning', $e->getMessage());
        }

        // Get The Parent answers for the question
        $answers = $question->parentAnswers;

        // If the User has already answered once, then just redirect to Conversation Page
        if ($answers->contains('user_id', $user->id)) {
            $parentAnswer = $answers->where('user_id', $user->id)->first();

            return Redirect::action('AnswerController@createReply', [$id, $parentAnswer->id]);
        }

        return view('modules.answer.create', compact('user', 'question'));

    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $question = $this->questionRepository->model->find($request->question_id);

        try {
            $user->canAnswer($question);
        } catch (\Exception $e) {
            return redirect()->back()->with('warning', $e->getMessage());
        }

        $answer = $question->answers()->create([
            'user_id'   => $user->id,
            'body_en'   => $request->body_en,
            'parent_id' => 0
        ]);

        // notify the student about the answer
        $answer->notifications()->create(['user_id' => $question->user_id]);

        return Redirect::action('AnswerController@createAnswer', $question->id)->with('success', 'Answer Posted');
    }

    public function createReply($questionId, $answerId)
    {
        // check whether valid subject, valid level, valid chat
        $user = Auth::user();

        $question = $this->questionRepository->model->find($questionId);

        // Check If the Reply is from Educator
        if (is_a($user->getType(), Educator::class)) {
            try {
                $user->canAnswer($question);
            } catch (\Exception $e) {
                return redirect()->back()->with('warning', $e->getMessage());
            }
        } elseif (is_a($user->getType(), Student::class)) {
            // Check If the Student Who asked this Question is Replying
            if (!($question->user_id === $user->id)) {
                return redirect()->back()->with('warning', 'You Cannot Reply This Question');
            }
        } else {
            return redirect()->back()->with('warning', 'Wrong Access');
        }

        $answer = $this->answerRepository->model->with(['user','notifications'])->find($answerId);

        // check whether the answer is parent ?
        if(!$answer->isParent()) {
            // if its not parent
            // find parent
            // find child answer IDs
            $answer = $this->answerRepository->model->with(['user','notifications'])->find($answer->parent_id);
            $childAnswerIDs = $question->childAnswers->modelKeys();
            $unreadNotifications = $user->unreadNotifications()->whereIn('notifiable_id',$childAnswerIDs)->where('notifiable_type','Answer')->get();
        } else {
            // If Parent
            $unreadNotifications = $user->unreadNotifications()->where('notifiable_id',$answer->id)->where('notifiable_type','Answer')->get();
        }

        // find all the unread notifications related to this user
        foreach($unreadNotifications as $notification) {
            $notification->markAsRead();
        }

        $answer->load('childAnswers.user');
        $childAnswers = $answer->childAnswers;

        return view('modules.answer.reply', compact('user', 'question', 'answer', 'childAnswers'));

    }

    public function storeReply(Request $request)
    {
        $user = Auth::user();
        $question = $this->questionRepository->model->find($request->question_id);
        $answer = $this->answerRepository->model->find($request->answer_id);

        $newAnswer = $this->answerRepository->model->create([
            'parent_id'   => $answer->id,
            'question_id' => $question->id,
            'user_id'     => $user->id,
            'body_en'     => $request->body_en
        ]);

        // notify user about the reply
        // if the educator is replying, then reply the student
        $parentAnswer = $this->answerRepository->model->with(['notifications'])->find($newAnswer->parent_id);

        // if the student is replying, then notify the educator
        if($user->id == $question->user_id) {
            // parent answer is always form educator, so get the user_id from parent answer
            $newAnswer->notifications()->create(['user_id' => $parentAnswer->user_id]);
        } else {
            // notify student about the reply
            $newAnswer->notifications()->create(['user_id' => $question->user_id]);
        }
        return Redirect::action('AnswerController@createReply', [$question->id, $newAnswer->id])->with('success','Answer Posted');
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $answer = $this->answerRepository->model->find($id);
        if($user->id != $answer->user_id) {
            return redirect()->back()->with('warning','you cannot delete this answer');
        }
        $request = Request::create('/admin/answer/' . $id, 'DELETE', []);
        Route::dispatch($request);
        return redirect()->back()->with('success','Answer deleted');
    }
}
