<?php
namespace App\Http\Composers;

use App\Src\Category\CategoryRepository;
use App\Src\Educator\Educator;
use App\Src\Level\LevelRepository;
use App\Src\Student\Student;
use App\Src\Subject\SubjectRepository;
use Auth;
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
        $isEducator = false;
        $isStudent = false;
        $user = false;

        if (Auth::check()) {
            $user = Auth::user();
            if (is_a($user->getType(), Educator::class)) {
                $isEducator = true;
            } elseif (is_a($user->getType(), Student::class)) {
                $isStudent = true;
            }
        }
        $view->with(['subjects' => $subjects, 'levels' => $levels, 'user' => $user, 'isEducator'=>$isEducator, 'isStudent'=>$isStudent]);

    }

}