<?php
namespace App\Http\Composers;

use App\Src\Blog\BlogRepository;
use Auth;
use Illuminate\Contracts\View\View;

class BlogPost
{


    /**
     * @var BlogRepository
     */
    private $blogRepository;


    /**
     * @param BlogRepository $blogRepository
     */
    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function compose(View $view)
    {
        $blogPost = $this->blogRepository->model->latest()->first();
        if($blogPost) {
            return $view->with(['blogPost'=>$blogPost]);
        }
        return $view->with(['blogPost'=>null]);
    }

}