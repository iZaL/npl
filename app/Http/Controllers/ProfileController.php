<?php

namespace App\Http\Controllers;


use App\Src\Educator\Educator;
use App\Src\Educator\EducatorRepository;
use App\Src\Student\Student;
use App\Src\Student\StudentRepository;
use App\Src\User\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Route;

class ProfileController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var EducatorRepository
     */
    private $educatorRepository;

    /**
     * @param UserRepository $userRepository
     * @param EducatorRepository $educatorRepository
     * @param StudentRepository $studentRepository
     */
    public function __construct(UserRepository $userRepository,EducatorRepository $educatorRepository, StudentRepository $studentRepository)
    {
        $this->userRepository = $userRepository;
        $this->educatorRepository = $educatorRepository;
    }

    public function getQuestions($id)
    {
        $user = Auth::user();

        if($user->id != $id || !$user->isStudent()) {
            return redirect()->home()->with('warning','Wrong access');
        }
        $student = $user->getType();
        $student->load('questions.parentAnswers');
        $student->load('questions.subject');
        $questions = $student->questions;

        return view('modules.profile.questions', compact('user','questions', 'answers'));
    }

    public function getAnswers($id)
    {
        $user = Auth::user();
        if($user->id != $id || !$user->isEducator()) {
            return redirect()->home()->with('warning','Wrong access');
        }

        $educator = $user->getType();
        $educator->load('parentAnswers.question.subject');
        $answers = $educator->parentAnswers;
        return view('modules.profile.answers', compact('user','answers'));
    }

    public function show($id)
    {
        $isOwner = false;
        $isEducator = false;
        $isStudent = false;
        $subjects = [];
        $user= $this->userRepository->model->with(['levels','subjects'])->find($id);
        $userType =  session()->get('userType');
        $levels =  implode(', ',(array_map(function($name) {
            return ucfirst($name);
        }, $user->levels->lists('name_en')->toArray())));

        if(Auth::user()->id == $id) {
            $isOwner =true;
            if($user->isEducator()) {
                $isEducator = true;
                // Iterate over subjects and return each subject with Uppercase

            } elseif($user->isStudent()) {
                $isStudent=true;
            }
            $subjects =  implode(', ',(array_map(function($name) {
                return ucfirst($name);
            }, $user->subjects->lists('name_en')->toArray())));
        }

        return view('modules.profile.view', compact('user','isOwner','userType','isEducator','isStudent','subjects','levels'));
    }

    public function edit($id)
    {
        $user = Auth::user();
        $profile = null;
        $isEducator = false;

        if($user->id != $id) {
            return redirect()->back()->with('warning','Operation not allowed');
        }

        if ($user->isEducator()) {
            $isEducator = true;
            $profile = $user->getType();
        }

        return view('modules.profile.edit', compact('user', 'currentUser','isEducator','profile'));
    }

    public function update(Request $request,$id)
    {
        $user = Auth::user();

        if($user->id != $id) {
            return redirect()->back()->with('warning','Operation not allowed');
        }

        $user->update($request->except(['qualification','experience']));

        $profile = $user->getType();

        if(is_a($profile,Educator::class)) {
            $profile->qualification = $request->qualification;
            $profile->experience = $request->experience;
            $profile->save();
        }

        return redirect()->action('ProfileController@show',$user->id)->with('success','Account Updated');
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $profile = $user->getType();

        // allow only to delete their own profile
        if($user->id == $id) {
            if (is_a($profile, Student::class)) {
                $this->deleteStudent($profile);
            } elseif (is_a($profile, Educator::class)) {
                $this->deleteEducator($profile);
            }
            Auth::logout();
            $user->delete();
            return redirect('/')->with('success','Account Deleted');
        }

        return redirect()->back()->with('warning','Wrong access');
    }

    private function deleteEducator(Educator $educator)
    {
        $educator = $educator->load([
            'profile',
            'profile.levels',
            'profile.subjects',
            'answers'
        ]);
        // delete answers
        $educator->answers ? $educator->answers()->delete() : '';
        $educator->profile->subjects()->detach();
        // delete levels
        $educator->profile->levels()->detach();
        // delete as student
        $educator->delete();
    }

    private function deleteStudent(Student $student)
    {
        $student = $student->load(['profile.levels','questions.answers']);
        // delete questions
        foreach ($student->questions as $question) {
            $question->answers()->delete();
            $question->delete();
        }
        // delete levels
        $student->profile->levels()->detach();
        // delete as student
        $student->delete();

    }

}
