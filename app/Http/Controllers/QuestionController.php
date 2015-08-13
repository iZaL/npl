<?php

namespace App\Http\Controllers;


use App\Src\Question\QuestionRepository;
use App\Src\Subject\SubjectRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{

    public function __construct()
    {

        Auth::loginUsingId(1);
    }

    /**
     * @param QuestionRepository $questionRepository
     * @return \Illuminate\View\View
     */
    public function index(QuestionRepository $questionRepository)
    {
        $questions = $questionRepository->model->all();

        return view('home', compact('subjects'));
    }

    public function create(SubjectRepository $subjectRepository)
    {
        $subjects = $subjectRepository->model->lists('name_en', 'id');

        return view('modules.question.create', compact('subjects'));
    }


    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        $user  = Auth::user();
        $this->validate($request, [
            'subject_id' => 'integer|required',
            'body_en'    => 'required'
        ]);

        $level = $user->levels->last();

    }
}
