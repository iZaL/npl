<?php

namespace App\Http\Controllers;

use App\Src\Answer\AnswerRepository;
use App\Src\Educator\Educator;
use App\Src\Question\QuestionRepository;
use App\Src\Student\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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
     * @param AnswerRepository $answerRepository
     * @param QuestionRepository $questionRepository
     */
    public function __construct(AnswerRepository $answerRepository, QuestionRepository $questionRepository)
    {
        $this->middleware('auth');
        $this->answerRepository = $answerRepository;
        $this->questionRepository = $questionRepository;
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
            $this->answerRepository->canAnswer($user, $question);
        } catch (\Exception $e) {
            return redirect()->back()->with('warning', $e->getMessage());
        }

        $answers = $question->parentAnswers;

        $userIds = $answers->lists('user_id')->toArray();

        // If the User has already answered once, then just redirect to Conversation Page
        if (in_array($user->id, $userIds)) {
            $parentAnswer = $answers->where('user_id',$user->id)->first();
            return Redirect::action('AnswerController@createReply', [$id, $parentAnswer->id]);
        }

        //Users Parent Answer
        $question->load('answers');

        return view('modules.answer.create', compact('user', 'question', 'answers', 'answered'));

    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $question = $this->questionRepository->model->find($request->question_id);

        try {
            $this->answerRepository->canAnswer($user, $question);
        } catch (\Exception $e) {
            return redirect()->back()->with('warning', $e->getMessage());
        }

        $question->answers()->create([
            'user_id'   => $user->id,
            'body_en'   => $request->body_en,
            'parent_id' => 0
        ]);

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
                $this->answerRepository->canAnswer($user, $question);
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

        $answer = $this->answerRepository->model->find($answerId);

        $answer->load('childAnswers');

        $childAnswers = $answer->childAnswers;

        return view('modules.answer.reply', compact('user', 'question', 'answer', 'childAnswers'));

    }

    public function storeReply(Request $request)
    {

        $user = Auth::user();
        $question = $this->questionRepository->model->find($request->question_id);

        $answer = $this->answerRepository->model->find($request->answer_id);

        $this->answerRepository->model->create([
            'parent_id'   => $answer->id,
            'question_id' => $question->id,
            'user_id'     => $user->id,
            'body_en'     => $request->body_en
        ]);

        return Redirect::action('AnswerController@createReply', [$question->id, $answer->id])->with('success',
            'Answer Posted');
    }
}
