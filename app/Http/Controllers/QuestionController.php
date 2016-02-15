<?php

namespace App\Http\Controllers;


use App\Src\Question\QuestionRepository;
use App\Src\Student\Student;
use App\Src\Subject\SubjectRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Route;

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

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $questions = $this->questionRepository->model->all();

        return view('modules.question.index', compact('questions'));
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

        $this->validate($request, [
            'subject_id' => 'integer|required',
            'body_en'    => 'required'
        ]);

        $user = Auth::user();

        $level = $user->levels->last();

        $question = $this->questionRepository->model->create(
            array_merge([
                'user_id'  => $user->id,
                'level_id' => $level->id
            ], $request->all())
        );

        return Redirect::action('StudentController@getQuestions')->with('success', 'Question posted');

    }

    public function destroy($id)
    {
        $user = Auth::user();
        $question = $this->questionRepository->model->find($id);
        if($user->id != $question->user_id) {
            return redirect()->back()->with('warning','you cannot delete this question');
        }
        $request = Request::create('/admin/question/' . $id, 'DELETE', []);
        Route::dispatch($request);
        return redirect()->back()->with('success','Answer deleted');
    }
}
