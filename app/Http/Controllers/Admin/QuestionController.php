<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Src\Question\QuestionRepository;
use App\Src\Subject\SubjectRepository;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * @var QuestionRepository
     */
    private $questionRepository;
    /**
     * @var SubjectRepository
     */
    private $subjectRepository;

    /**
     * @param QuestionRepository $questionRepository
     * @param SubjectRepository $subjectRepository
     */
    public function __construct(QuestionRepository $questionRepository, SubjectRepository $subjectRepository)
    {
        $this->questionRepository = $questionRepository;
        $this->subjectRepository = $subjectRepository;
    }

    public function index()
    {
        $questions = $this->questionRepository->model->with(['user', 'answersCount'])->paginate(50);

        return view('admin.modules.question.index', compact('questions'));
    }

    public function show($id)
    {
        return redirect()->back()->with('info', 'Method Not Yet Implemented');
    }

    public function edit($id)
    {
        $question = $this->questionRepository->model->with(['user', 'answersCount'])->find($id);
        $subjects = $this->subjectRepository->model->lists('name_en', 'id');

        return view('admin.modules.question.edit', compact('question', 'subjects'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'subject_id' => 'integer|required',
            'body_en'    => 'required'
        ]);
        $question = $this->questionRepository->model->find($id);

        $question->fill($request->all());

        if ($question->isDirty('subject_id')) {
            // @todo: fire event to notify educators about new question
        }
        $question->save($request->all());

        return redirect()->back()->with('success', 'Question Updated');

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

        return redirect()->back()->with('success', 'Question Deleted');
    }
}
