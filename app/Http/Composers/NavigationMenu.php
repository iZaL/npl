<?php
namespace App\Http\Composers;

use App\Src\Category\CategoryRepository;
use App\Src\Level\LevelRepository;
use App\Src\Subject\SubjectRepository;
use Illuminate\Contracts\View\View;

class NavigationMenu
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
     * @param SubjectRepository $subjectRepository
     * @param LevelRepository $levelRepository
     */
    public function __construct(SubjectRepository $subjectRepository, LevelRepository $levelRepository)
    {
        $this->subjectRepository = $subjectRepository;
        $this->levelRepository = $levelRepository;
    }

    public function compose(View $view)
    {
        $subjects = $this->subjectRepository->model->get(['id', 'name_en']);
        $levels = $this->levelRepository->model->get(['id', 'name_en']);
        $view->with(['subjects' => $subjects, 'levels' => $levels]);
    }

}