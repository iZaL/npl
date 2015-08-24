<?php

namespace App\Http\Controllers;

use App\Src\Answer\AnswerRepository;
use App\Src\Educator\Educator;
use App\Src\Question\QuestionRepository;
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
        Auth::user();
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
        $educator = false;
        if (is_a($user->getType(), Educator::class)) {
            $educator = true;
        }

        $answers = $question->parentAnswers;

        $question->load('answers');

        if ($educator) {
            return view('modules.answer.create', compact('user', 'educator', 'question', 'answers'));
        }
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $question = $this->questionRepository->model->find($request->question_id);

        $question->answers()->create([
            'user_id'   => $user->id,
            'body_en'   => $request->body_en,
            'parent_id' => 0
        ]);


        return Redirect::action('AnswerController@createAnswer', $question->id)->with('success', 'Answer Posted');
    }

    public function createReply($questionId,$answerId)
    {
        $user = Auth::user();
        $question = $this->questionRepository->model->find($questionId);
        $answer = $this->answerRepository->model->find($answerId);

        $childAnswers = $answer->childAnswers;

        return view('modules.answer.reply',compact('user','question','answer','childAnswers'));

    }

    public function storeReply(Request $request)
    {

        $user = Auth::user();
        $question = $this->questionRepository->model->find($request->question_id);

        $answer = $this->answerRepository->model->find($request->answer_id);

        $this->answerRepository->model->create([
            'parent_id' => $answer->id,
            'question_id' => $question->id,
            'user_id' => $user->id,
            'body_en' => $request->body_en
        ]);

        return Redirect::action('AnswerController@createReply',[$question->id,$answer->id])->with('success','Answer Posted');
    }
}
