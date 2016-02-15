<?php

namespace App\Http\Controllers;


use App\Src\Educator\Educator;
use App\Src\Student\Student;
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
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        Auth::user();
        $this->userRepository = $userRepository;
    }

    public function getQuestions($id)
    {
        if(Auth::user()->id != $id) {
            return redirect()->home()->with('warning','Operation not allowed');
        }

        $user = $this->userRepository->model->find($id);

        if (!$user->isStudent()) {
            return redirect()->home()->with('warning', 'Wrong Access');
        }

        $student = $user->getType();
        $student->load('questions.parentAnswers');
        $student->load('questions.subject');
        $questions = $student->questions;

        return view('modules.profile.questions', compact('user','questions', 'answers'));
    }

    public function getAnswers($id)
    {
        if(Auth::user()->id != $id) {
            return redirect()->home()->with('warning','Operation not allowed');
        }

        $user = $this->userRepository->model->find($id);

        if (!$user->isEducator()) {
            return redirect()->home()->with('warning', 'Wrong Access');
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
                $subjects =  implode(', ',(array_map(function($name) {
                    return ucfirst($name);
                }, $user->subjects->lists('name_en')->toArray())));
            } elseif($user->isStudent()) {
                $isStudent=true;
            }
        }

        return view('modules.profile.view', compact('user','isOwner','userType','isEducator','isStudent','subjects','levels'));
    }

    public function edit($id)
    {
        if(Auth::user()->id != $id) {
            return redirect()->back()->with('warning','Operation not allowed');
        }

        $user = $this->userRepository->model->find($id);
        $profile = null;
        $isEducator = false;

        if ($user->isEducator()) {
            $isEducator = true;
            $profile = $user->getType();
        }

        return view('modules.profile.edit', compact('user', 'currentUser','isEducator','profile'));
    }

    public function update(Request $request,$id)
    {
        if(Auth::user()->id != $id) {
            return redirect()->back()->with('warning','Operation not allowed');
        }

        $user = $this->userRepository->model->find($id);

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
        if(Auth::user()->id == $id) {
            $user = $this->userRepository->model->find($id);
            if (is_a($student = $user->getType(), Student::class)) {
                $request = Request::create('/admin/student/' . $student->id, 'DELETE', []);
                Route::dispatch($request);

            } elseif (is_a($educator = $user->getType(), Educator::class)) {
                $request = Request::create('/admin/educator/' . $educator->id, 'DELETE', []);
                Route::dispatch($request);
            }

            $user->delete();

            Auth::logout();

            return redirect('/')->with('success','Account Deleted');
        }

        return redirect()->back()->with('warning','Operation not allowed');
    }

}
