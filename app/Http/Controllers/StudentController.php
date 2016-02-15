<?php

namespace App\Http\Controllers;

use App\Src\Student\Student;
use App\Src\User\UserRepository;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;


    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $student = false;

        if (Auth::check()) {
            $user = Auth::user();
            if (is_a($user->getType(), Student::class)) {
                $student = true;
            }
        }

        return view('modules.student.index', compact('student','user'));
    }

    public function getQuestions()
    {
        $user = Auth::user();
        $student = $user->getType();

        if (!is_a($student, Student::class)) {
            return redirect()->back()->with('warning', 'Wrong Access');
        }

        $questions = $student->questions()->with([
            'subject','parentAnswers.recentReply.user','parentAnswers.user'])
            ->latest()->get();
        return view('modules.student.questions', compact('questions', 'answers','user'));
    }

}
