<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Src\Student\StudentRepository;
use App\Src\User\UserRepository;

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
     * @param UserRepository $userRepository
     * @param StudentRepository $studentRepository
     */
    public function __construct(UserRepository $userRepository, StudentRepository $studentRepository)
    {
        $this->userRepository = $userRepository;
        $this->studentRepository = $studentRepository;
    }

    public function index()
    {
        $students = $this->studentRepository->model->with(['profile', 'questionsCount'])->paginate(100);

        return view('admin.modules.student.index', compact('students'));
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
