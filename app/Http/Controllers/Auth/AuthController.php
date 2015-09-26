<?php

namespace App\Http\Controllers\Auth;

use App\Events\EducatorAddedSubject;
use App\Events\EducatorAddedSubjects;
use App\Events\UserActivated;
use App\Events\UserRegistered;
use App\Jobs\NotifySubjectPendingApproval;
use App\Src\Level\LevelRepository;
use App\Src\Subject\SubjectRepository;
use App\Src\User\AuthManager;
use App\Src\User\UserRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    // deactive default registration
    public function getRegister()
    {
        return null;
    }

    // deactive default registration
    public function postRegister()
    {
        return null;
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required',
            'password' => 'required',
        ]);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }

        if (Auth::attempt((['email' => $request->get('email'), 'password' => $request->get('password'), 'active' => 1]),
            $request->has('remember'))
        ) {
            return $this->handleUserWasAuthenticated($request, $throttles);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        if ($throttles) {
            $this->incrementLoginAttempts($request);
        }

        return redirect($this->loginPath())
            ->withInput($request->only($this->loginUsername(), 'remember'))
            ->withErrors([
                $this->loginUsername() => $this->getFailedLoginMessage(),
            ]);
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
        $levels = $this->levelRepository->model->lists('name_en', 'id');

        return view('auth.student-register', compact('levels'));
    }

    public function educatorRegistration()
    {
        $subjects = $this->subjectRepository->model->lists('name_en', 'id');
        $levels = $this->levelRepository->model->lists('name_en', 'id');

        return view('auth.educator-register', compact('subjects', 'levels'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEducatorRegistration(Request $request)
    {

        $this->validate($request, [
            'email'        => 'required|email|unique:users,email',
            'password'     => 'required|confirmed|max:255|min:5',
            'firstname_en' => 'required',
            'levels'       => 'required|array',
            'subjects'     => 'required|array'
        ]);

        $user = $this->registerUser($request);

        if ($request->subjects) {
            $user->subjects()->sync($request->subjects);
        }

        //Fire Event to Notify Admin
        // Fire Event to Notify Admin

        event(new EducatorAddedSubjects($user, (array)$request->subjects));

        $user->educator()->create([]);

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

        $this->validate($request, [
            'email'        => 'required|email|unique:users,email',
            'password'     => 'required|confirmed|max:255|min:5',
            'firstname_en' => 'required',
            'levels'       => 'required|array',
        ]);

        $user = $this->registerUser($request);

        $user->student()->create([]);

        return redirect('/auth/login')->with('message', 'registration success');

    }

    public function registerUser($request)
    {

        $activationCode = str_random(30);

        array_add($request, 'activation_code', $activationCode);

        $request->merge(['password' => bcrypt($request->password)]);

        $user = $this->userRepository->model->create($request->except([
            'levels',
            'subjects',
            'password_confirmation',
        ]));

        if ($request->levels) {

            $user->levels()->sync($request->levels);
        }

        event(new UserRegistered($user));

        return $user;
    }

    /**
     * @param AuthManager $authManager
     * @param $token
     * Confirm the User and Activate
     * Lands on this page When User Clicks the Activation Link in Email
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getActivate(AuthManager $authManager, $token)
    {
        // If not activated ( errors )
        try {
            $user = $authManager->activateUser($token);
            event(new UserActivated($user));
        } catch (\Exception $e) {

            return redirect('home')->with('error', 'Could\'nt activate your account. please contact admin');
        }

        // redirect to home with active message
        return redirect('auth/login')->with('success', trans('auth.alerts.account_activated'));

    }

}
