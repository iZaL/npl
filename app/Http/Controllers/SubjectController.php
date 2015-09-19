<?php

namespace App\Http\Controllers;


use App\Src\Level\LevelRepository;
use App\Src\Subject\SubjectRepository;

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
        $levels = $levelRepository->model->with([
            'latestQuestions' => function ($q) use ($id) {
                $q->where('subject_id', $id);
            }
        ])->get();

        $levels-load('latestQuestions');

        $subject = $this->subjectRepository->model->find($id);

        return view('modules.subject.view', compact('subject', 'levels'));
    }

}
