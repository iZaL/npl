<?php

namespace App\Http\Controllers;


use App\Src\Question\QuestionRepository;
use App\Src\Subject\SubjectRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        Auth::loginUsingId(1);
        $this->questionRepository = $questionRepository;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $questions = $this->questionRepository->model->all();

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
        $user = Auth::user();
        $level = $user->levels->last();
        $this->validate($request, [
            'subject_id' => 'integer|required',
            'body_en'    => 'required'
        ]);

        $question = $this->questionRepository->model->create(
            array_merge([
                'user_id'  => $user->id,
                'level_id' => $level->id
            ], $request->all())
        );

        return Redirect::action('HomeController@index')->with('success','Question posted');

    }
}
