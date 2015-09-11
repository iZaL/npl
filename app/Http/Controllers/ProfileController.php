<?php

namespace App\Http\Controllers;


use App\Src\Student\Student;
use App\Src\User\UserRepository;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
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
        Auth::user();
        $this->userRepository = $userRepository;
    }


    public function editProfile()
    {
        $user = Auth::user();

        return view('modules.user.profile', compact('user'));
    }

    public function getQuestions()
    {
        $user = Auth::user();
        $user->load('questions');

        $questions = $user->questions;
        $questions->load('subject');
        $questions->load('parentAnswers');

        return view('modules.user.question',compact('questions','answers'));
    }
}
