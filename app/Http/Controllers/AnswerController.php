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
     * @return \Illuminate\View\View
     */
    public function index()
    {

    }

    /**
     * @param $id
     */
    public function createAnswer($id)
    {
        // check if valid question
        // check if the educator can answer the question ( Has Subject and Valid Level )
        $question = $this->questionRepository->model->find($id);

        $user = Auth::user();

        if (!$this->answerRepository->canAnswer($user, $question)) {
            return redirect()->back()->with('warning', ' You Cannot Answer This Question');
        }

        $answers = $question->parentAnswers;

        $question->load('answers');

        return view('modules.answer.create', compact('user', 'question', 'answers'));

    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $question = $this->questionRepository->model->find($request->question_id);

        if (!$this->answerRepository->canAnswer($user, $question)) {
            return redirect()->back()->with('warning', ' You Cannot Answer This Question');
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
        if(is_a($user->getType(),Educator::class)) {
            if (!$this->answerRepository->canAnswer($user, $question)) {
                return redirect()->back()->with('warning', ' You Cannot Reply This Question 1');
            }
        } elseif (is_a($user->getType(), Student::class)) {
            // Check If the Student Who asked this Question is Replying
            if (!($question->user_id === $user->id)) {
                return redirect()->back()->with('warning', ' You Cannot Reply This Question 2');
            }
        } else {
            dd('cant reply');
        }

        $answer = $this->answerRepository->model->find($answerId);

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
