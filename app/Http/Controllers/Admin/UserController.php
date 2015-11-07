<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Src\Educator\Educator;
use App\Src\Student\Student;
use App\Src\User\UserRepository;
use Auth;
use Illuminate\Http\Request;
use Route;

class UserController extends Controller
{
    /**
     * @var QuestionRepository
     */
    private $questionRepository;
    /**
     * @var AnswerRepository
     */
    private $answerRepository;
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
        $currentUser = Auth::user();

        $users = $this->userRepository->model->paginate(100);

        return view('admin.modules.user.index', compact('users', 'currentUser'));
    }

    public function show()
    {
    }

    public function edit($id)
    {
//        return redirect()->back()->with('info', 'Method not yet implemented');
        $currentUser = Auth::user();

        $user = $this->userRepository->model->find($id);

        return view('admin.modules.user.edit', compact('user', 'currentUser'));
    }

    public function update(Request $request, $id)
    {
        $currentUser = Auth::user();

        $user = $this->userRepository->model->find($id);

        if (($request->admin == 0) && ($currentUser->id == $user->id)) {
            return redirect()->back()->with('warning', 'You Cannot Un Admin Yourself');
        }

        $user->update($request->all());

        return redirect()->back()->with('success', 'User Updated');
    }

    public function destroy($id)
    {
        //@todo : update subjects,answers,user_subjects,user_levels
        $currentUser = Auth::user();

        $user = $this->userRepository->model->find($id);

        if (($currentUser->id == $user->id)) {
            return redirect()->back()->with('warning', 'You Cannot Delete Yourself');
        }

        if (is_a($student = $user->getType(), Student::class)) {
            $request = Request::create('/admin/student/' . $student->id, 'DELETE', []);
            Route::dispatch($request);

        } elseif (is_a($educator = $user->getType(), Educator::class)) {
            $request = Request::create('/admin/educator/' . $educator->id, 'DELETE', []);
            Route::dispatch($request);
        }

        $user->delete();

        return redirect()->back()->with('success', 'User Deleted');

    }
}
