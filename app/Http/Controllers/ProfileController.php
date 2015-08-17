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
        Auth::loginUsingId(2);
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
        $questions = $user->questions;

        return view('modules.user.question',compact('questions'));
    }
}
