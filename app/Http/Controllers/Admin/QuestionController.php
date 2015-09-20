<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Src\Question\QuestionRepository;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * @var QuestionRepository
     */
    private $questionRepository;

    /**
     * @param QuestionRepository $questionRepository
     */
    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    public function index()
    {
        $questions = $this->questionRepository->model->with(['user','answersCount'])->paginate(50);

        return view('admin.modules.question.index',compact('questions'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // delete all the answers for the question
        $question = $this->questionRepository->model->find($id);

        $question->answers()->delete();

        $question->delete();

        return redirect()->back()->with('success','Question Deleted');
    }
}
