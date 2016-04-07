<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Src\Level\LevelRepository;
use App\Src\Student\StudentRepository;
use App\Src\Subject\SubjectRepository;
use App\Src\User\UserRepository;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var StudentRepository
     */
    private $studentRepository;
    /**
     * @var LevelRepository
     */
    private $levelRepository;
    /**
     * @var SubjectRepository
     */
    private $subjectRepository;

    /**
     * @param UserRepository $userRepository
     * @param StudentRepository $studentRepository
     * @param LevelRepository $levelRepository
     */
    public function __construct(UserRepository $userRepository, StudentRepository $studentRepository,LevelRepository $levelRepository,SubjectRepository $subjectRepository)
    {
        $this->userRepository = $userRepository;
        $this->studentRepository = $studentRepository;
        $this->levelRepository = $levelRepository;
        $this->subjectRepository = $subjectRepository;
    }

    public function index(Request $request)
    {
        $selectedLevel = $request->level ? : '';
        $selectedSubject = $request->subject ? : '';

        $students = $this->studentRepository->model->with(['profile', 'questionsCount']);

        $selectedLevel ? $students->whereHas('profile.levels',function($q) use ($request) {
            $q->where('levels.id',$request->level);
        }) : '';
        $selectedSubject ? $students->whereHas('profile.subjects',function($q) use ($request) {
            $q->where('subjects.id',$request->subject);
        }) : '';

        $subjects = [''=>'all subjects']+$this->subjectRepository->model->lists('name_en', 'id')->toArray();

        $levels = [''=>'all levels']+$this->levelRepository->model->lists('name_en', 'id')->toArray();

        $students = $students->paginate(100);

        return view('admin.modules.student.index', compact('subjects','selectedSubject','students','selectedLevel','levels'));
    }

    public function show($id)
    {
        return redirect()->back()->with('info', 'Method Not Yet Implemented');
    }
    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $student = $this->studentRepository->model->with(['profile', 'profile.levels'])->find($id);

        // delete questions
        foreach ($student->questions as $question) {
            $question->answers()->delete();
            $question->delete();
        }

        // delete levels
        $student->profile->levels()->detach();

        // delete as student
        $student->delete();

        return redirect()->action('Admin\StudentController@index')->with('success', 'Student Removed');
    }

}
