<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Src\Educator\EducatorRepository;
use App\Src\User\UserRepository;

class EducatorController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var StudentRepository
     */
    private $educatorRepository;

    /**
     * @param UserRepository $userRepository
     * @param EducatorRepository $studentRepository
     */
    public function __construct(UserRepository $userRepository, EducatorRepository $educatorRepository)
    {
        $this->userRepository = $userRepository;
        $this->educatorRepository = $educatorRepository;
    }

    public function index()
    {

        $educators = $this->educatorRepository->model->with(['profile', 'answersCount'])->paginate(100);

        return view('admin.modules.educator.index', compact('educators'));
    }

    public function show($id)
    {

    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $educator = $this->educatorRepository->model->with(['profile', 'profile.levels','profile.subjects'])->find($id);

        // delete questions
        foreach ($educator->answers as $answer) {
            $answer->delete();
        }

        $subjects = $educator->profile->subjects->modelKeys();
        $educator->profile->subjects()->detach($subjects);

        // delete levels
        $levels = $educator->profile->levels->modelKeys();
        $educator->profile->levels()->detach($levels);

        // delete as student
        $educator->delete();

        return redirect()->action('Admin\StudentController@index')->with('success', 'Educator Removed');
    }

}
