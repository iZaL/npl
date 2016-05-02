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

    public function getQuestions()
    {
        $user = Auth::user();
        $student = $user->getType();

        $userNotificationsArray = $user->notifications->where('notifiable_type','MorphAnswer')->lists('notifiable_id')->toArray();

        $questions = $student->questions()->with([
            'parentAnswers'=>function($q) {
                $q->latest();
            },
            'parentAnswers.notifications',
            'subject',
            'parentAnswers.recentReply.user',
            'parentAnswers.user'
        ])->latest()->get();
        return view('modules.student.questions', compact('questions', 'answers','user','userNotificationsArray'));
    }

}
