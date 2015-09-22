<?php

namespace App\Http\Controllers;

use App\Src\Subject\SubjectRepository;

class HomeController extends Controller
{
    /**
     * @param SubjectRepository $subjectRepository
     * @return \Illuminate\View\View
     */
    public function index(SubjectRepository $subjectRepository)
    {
        $subjects = $subjectRepository->model->all();
        return view('land',compact('subjects'));
    }

}
