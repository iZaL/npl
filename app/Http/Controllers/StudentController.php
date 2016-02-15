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

        $questions = $student->questions()->with(['subject','parentAnswers.recentReply.user','parentAnswers.user'])->latest()->get();
//        $user = Auth::user();
//
//        if (!is_a($user->getType(), Educator::class)) {
//            return redirect()->back()->with('warning', 'Invalid Access');
//        }
//
//        $subjectIds = $user->activeSubjects->modelKeys();
//        $levelIds = $user->levels->modelKeys();
//
//        // questions for the educator
//        $questions = $questionRepository->model->with([
//            'subject',
//            'parentAnswers.recentReply' => function ($q) use ($user) {
//                $q->where('user_id', $user->id)->latest();
//            }
//        ])->whereIn('subject_id', $subjectIds)->whereIn('level_id',
//            $levelIds)->get();

        return view('modules.student.questions', compact('questions', 'answers','user'));
    }

}
