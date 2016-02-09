<?php

namespace App\Http\Controllers;


use App\Src\Educator\Educator;
use App\Src\Student\Student;
use App\Src\User\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

    public function viewQuestions($id)
    {
        dd($id);

    }

    public function viewAnswers($id)
    {
        dd($id);
    }

    public function show($id)
    {
        $isOwner = false;
        $isEducator = false;
        $isStudent = false;
        $subjects = [];
        $user= $this->userRepository->model->with(['levels','subjects'])->find($id);
        $userType =  (new \ReflectionClass($user->getType()))->getShortName();
        $levels =  implode(',',$user->levels->lists('name_en')->toArray());

        if(Auth::check() && (Auth::user()->id == $id)) {
            $isOwner =true;
            if(is_a($user->getType(),Educator::class)) {
                $isEducator = true;
                $subjects =  implode(',',$user->subjects->lists('name_en')->toArray());

            }elseif(is_a($user->getType(),Student::class)) {
                $isStudent=true;
            }
        }

        return view('modules.profile.view', compact('user','isOwner','userType','isEducator','isStudent','subjects','levels'));
    }

    public function edit($id)
    {
        if(Auth::check() && (Auth::user()->id != $id)) {
            return redirect()->back()->with('warning','Operation not allowed');
        }

        $user = $this->userRepository->model->find($id);
        $profile = null;
        $isEducator = false;

        if (is_a($user->getType(), Educator::class)) {
            $isEducator = true;
            $profile = $user->getType();
        }

        return view('modules.profile.edit', compact('user', 'currentUser','isEducator','profile'));
    }

    public function update(Request $request,$id)
    {
        if(Auth::check() && (Auth::user()->id != $id)) {
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
        if(Auth::check() && Auth::user()->id == $id) {
            $user = $this->userRepository->model->find($id);
            //@todo: delete user account
            //        $user->delete();
//            Auth::logout();
            return redirect()->action('ProfileController@show',$user->id)->with('success','Account Deleted');
        }

        return redirect()->back()->with('warning','Operation not allowed');
    }

}
