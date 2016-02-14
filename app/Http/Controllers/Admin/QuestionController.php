<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Src\Level\LevelRepository;
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
     * @var LevelRepository
     */
    private $levelRepository;

    /**
     * @param QuestionRepository $questionRepository
     * @param SubjectRepository $subjectRepository
     * @param LevelRepository $levelRepository
     */
    public function __construct(QuestionRepository $questionRepository, SubjectRepository $subjectRepository,LevelRepository $levelRepository)
    {
        $this->questionRepository = $questionRepository;
        $this->subjectRepository = $subjectRepository;
        $this->levelRepository = $levelRepository;
    }

    public function index(Request $request)
    {
        $selectedSubject = $request->subject ? : '';
        $selectedLevel = $request->level ? : '';

        $questions = $this->questionRepository->model->with(['user', 'answeredEducatorsCount']);

        $selectedSubject ? $questions->where('subject_id',$selectedSubject) : '';
        $selectedLevel ? $questions->where('level_id',$selectedLevel) : '';

        $questions = $questions->paginate(100);

        $subjects = [''=>'all subjects']+$this->subjectRepository->model->lists('name_en', 'id')->toArray();
        $levels = [''=>'all levels']+$this->levelRepository->model->lists('name_en', 'id')->toArray();

//        dd($questions);
        return view('admin.modules.question.index', compact('questions','subjects','levels','selectedSubject','selectedLevel'));
    }

    public function show($id)
    {
        $question = $this->questionRepository->model->find($id);
        return view('admin.modules.question.view', compact('question'));
    }

    public function edit($id,Request $request)
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

        foreach($question->answers as $answer) {
            if($answer->isParent()) {
                foreach($answer->childAnswers as $child) {
                    $child->notifications()->delete();
                }
                $answer->childAnswers()->delete();
            }
            $answer->notifications()->delete();
        }

        $question->answers()->delete();

        $question->delete();

        return redirect()->back()->with('success', 'Question Deleted');
    }
}
