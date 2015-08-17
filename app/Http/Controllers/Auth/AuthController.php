<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserRegistered;
use App\Src\Level\LevelRepository;
use App\Src\Student\StudentRepository;
use App\Src\Subject\SubjectRepository;
use App\Src\User\UserRepository;
use App\User;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var SubjectRepository
     */
    private $subjectRepository;
    /**
     * @var LevelRepository
     */
    private $levelRepository;

    /**
     * Create a new authentication controller instance.
     *
     * @param UserRepository $userRepository
     * @param SubjectRepository $subjectRepository
     * @param LevelRepository $levelRepository
     */
    public function __construct(
        UserRepository $userRepository,
        SubjectRepository $subjectRepository,
        LevelRepository $levelRepository
    ) {
        $this->middleware('guest', ['except' => 'getLogout']);
        $this->userRepository = $userRepository;
        $this->subjectRepository = $subjectRepository;
        $this->levelRepository = $levelRepository;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => 'required|max:255',
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    public function studentRegistration()
    {
        $subjects = $this->subjectRepository->model->get(['name_en', 'id']);
        $levels = $this->levelRepository->model->get(['name_en', 'id']);

        return view('auth.student-register', compact('subjects', 'levels'));
    }

    public function educatorRegistration()
    {
        $subjects = $this->subjectRepository->model->get(['name_en', 'id']);
        $levels = $this->levelRepository->model->get(['name_en', 'id']);

        return view('auth.educator-register', compact('subjects', 'levels'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEducatorRegistration(Request $request)
    {
        $user = $this->registerUser($request);

        $user->educator()->create([]);

        //@todo : send verificiation email
        return redirect('/auth/login')->with('message', 'registration success');
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param Request $request
     * @return User
     * @internal param array $data
     */
    protected function postStudentRegistration(Request $request)
    {

        $user = $this->registerUser($request);

        $user->student()->create([]);

        //@todo : send verificiation email
        return redirect('/auth/login')->with('message', 'registration success');

    }

    public function registerUser($request)
    {
        $this->validate($request, [
            'email'        => 'required|email|unique:users,email',
            'password'     => 'required|confirmed|max:255|min:5',
            'firstname_en' => 'required',
        ]);

        $user = $this->userRepository->model->create($request->except(['levels', 'subjects', 'password_confirmation']));

        event(new UserRegistered($user));

        $user->levels()->sync($request->levels);

        $user->subjects()->sync($request->subjects);

        return $user;
    }
}
