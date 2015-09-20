<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Src\Educator\EducatorRepository;
use App\Src\Subject\SubjectRepository;

class HomeController extends Controller
{

    /**
     * Show the application dashboard to the user.
     *
     * @param EducatorRepository $educatorRepository
     * @param SubjectRepository $subjectRepository
     * @return Response
     */
    public function index(EducatorRepository $educatorRepository, SubjectRepository $subjectRepository)
    {
        // Find newly Registered Educators and their Subjects to Approve
        $educators = $educatorRepository->model->with([
            'profile.activeSubjects',
            'profile.inActiveSubjects',
            'answersCount'
        ])->has('profile.inActiveSubjects')->latest()->paginate(100);

        $subjects = $subjectRepository->model->get(['id','name_en']);
        return view('admin.home', compact('educators','subjects'));
    }

}
