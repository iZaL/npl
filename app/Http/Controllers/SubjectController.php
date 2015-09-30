<?php

namespace App\Http\Controllers;


use App\Src\Educator\Educator;
use App\Src\Level\LevelRepository;
use App\Src\Subject\SubjectRepository;
use Auth;

class SubjectController extends Controller
{
    /**
     * @var SubjectRepository
     */
    private $subjectRepository;

    /**
     * @param SubjectRepository $subjectRepository
     */
    public function __construct(SubjectRepository $subjectRepository)
    {
        $this->subjectRepository = $subjectRepository;
    }

    /**
     * @param $id
     * @param LevelRepository $levelRepository
     * @return \Illuminate\View\View
     */
    public function show($id, LevelRepository $levelRepository)
    {

        $user = null;
        $isEducator = false;
        $userSubjects = [];
        $userLevels = [];

        if (Auth::check()) {

            $user = Auth::user();

            if (is_a($user->getType(), Educator::class)) {
                $isEducator = true;
                $userSubjects = $user->subjects->modelKeys();
                $userLevels = $user->levels->modelKeys();
            }

        }

        $levels = $levelRepository->model->with([
            'latestQuestions' => function ($q) use ($id) {
                $q->where('subject_id', $id);
            }
            ,
            'latestQuestions.user'
        ])->get();

        $subject = $this->subjectRepository->model->find($id);

        return view('modules.subject.view',
            compact('subject', 'levels', 'userLevels', 'userSubjects', 'isEducator', 'user'));
    }

}
