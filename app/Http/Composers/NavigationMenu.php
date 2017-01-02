<?php
namespace App\Http\Composers;

use App\Src\Blog\Category;
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
     * @var Category
     */
    private $category;


    /**
     * @param SubjectRepository $subjectRepository
     * @param LevelRepository $levelRepository
     * @param Category $category
     */
    public function __construct(SubjectRepository $subjectRepository, LevelRepository $levelRepository,Category $category)
    {
        $this->subjectRepository = $subjectRepository;
        $this->levelRepository = $levelRepository;
        $this->category = $category;
    }

    public function compose(View $view)
    {
        $categories = $this->category->where('name_en','!=','Editorials')->get(['id', 'name_en']);
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

        $view->with(['subjects' => $subjects, 'levels' => $levels, 'user' => $user, 'isEducator'=>$isEducator, 'isStudent'=>$isStudent,
            'categories' => $categories
        ]);

    }

}