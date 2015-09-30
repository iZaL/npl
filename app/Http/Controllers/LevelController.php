<?php

namespace App\Http\Controllers;


use App\Src\Educator\Educator;
use App\Src\Level\LevelRepository;
use App\Src\Subject\SubjectRepository;
use Auth;

class LevelController extends Controller
{
    /**
     * @var SubjectRepository
     */
    private $subjectRepository;
    /**
     * @var LevelRepository
     */
    private $levelRepository;

    /**
     * @param LevelRepository $levelRepository
     * @param SubjectRepository $subjectRepository
     */
    public function __construct(LevelRepository $levelRepository, SubjectRepository $subjectRepository)
    {
        $this->subjectRepository = $subjectRepository;
        $this->levelRepository = $levelRepository;
    }


    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // get all subjects
        // get all questions
        // and relevant

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

        $level = $this->levelRepository->model->find($id);

        $subjects = $this->subjectRepository->model->with([
            'latestQuestions' => function ($q) use ($id) {
                $q->where('level_id', $id);
            },
            'latestQuestions.user'
        ])->get();

        return view('modules.level.view',
            compact('subjects', 'level', 'userLevels', 'userSubjects', 'isEducator', 'user'));
    }

}
