<?php

namespace App\Http\Controllers;

use App\Src\Educator\Educator;
use App\Src\Student\Student;
use App\Src\Subject\SubjectRepository;
use Auth;

class HomeController extends Controller
{
    /**
     * @param SubjectRepository $subjectRepository
     * @return \Illuminate\View\View
     */
    public function index(SubjectRepository $subjectRepository)
    {
        $subjects = $subjectRepository->model->all();

        return view('land', compact('subjects'));
    }

    public function home()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if (is_a($student = $user->getType(), Student::class)) {

                return redirect()->action('StudentController@getQuestions');

            } elseif (is_a($educator = $user->getType(), Educator::class)) {

                return redirect()->action('EducatorController@getQuestions');
            }
        }

        return view('home');
    }

}
