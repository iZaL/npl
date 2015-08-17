<?php

namespace App\Http\Controllers;


use App\Src\Level\LevelRepository;
use App\Src\Subject\SubjectRepository;

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
        $level = $this->levelRepository->model->find($id);

        $subjects = $this->subjectRepository->model->with(['latestQuestions'=> function ($q) use ($id) {
            $q->where('level_id', $id);
        }])->get();

        return view('modules.level.view', compact('subjects', 'level'));
    }

}
