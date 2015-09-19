<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Src\Answer\AnswerRepository;
use App\Src\Question\QuestionRepository;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * @var QuestionRepository
     */
    private $questionRepository;
    /**
     * @var AnswerRepository
     */
    private $answerRepository;

    /**
     * @param AnswerRepository $answerRepository
     * @param QuestionRepository $questionRepository
     */
    public function __construct(AnswerRepository $answerRepository, QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
        $this->answerRepository = $answerRepository;
    }

    public function index()
    {
        $answers = $this->answerRepository->model->has('parentAnswers')->paginate(50);

        $answers->load('question');
        $answers->load('childAnswersCount');

        return view('admin.modules.answer.index', compact('answers'));

    }

    public function show()
    {

    }

    public function create()
    {


    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {

    }

    /**
     * @param $id
     */
    public function edit($id)
    {

    }

    /**
     * @param $id
     */
    public function update($id)
    {

    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        // IF Parent Answer delete All Child Answers
        dd('deleting answer '.$id);

    }
}
