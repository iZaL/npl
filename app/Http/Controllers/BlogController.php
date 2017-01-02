<?php

namespace App\Http\Controllers;

use App\Src\Blog\BlogRepository;
use App\Src\Blog\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    /**
     * @var CategoryRepository
     */
    private $blogRepository;
    /**
     * @var Category
     */
    private $categoryRepository;

    /**
     * @param BlogRepository $blogRepository
     * @param Category $categoryRepository
     */
    public function __construct(BlogRepository $blogRepository,Category $categoryRepository)
    {
        $this->blogRepository = $blogRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
        $editorialCategory = $this->categoryRepository->where('name_en','Editorials')->first();
        $ids = $editorialCategory ? [$editorialCategory->id] : [];
        $blogs = $this->blogRepository->model->with(['thumbnail','category'])->whereIn('category_id',$ids)->paginate(20);
        $title = 'Editorials';
        return view('modules.blog.index', compact('blogs','title'));
    }

    public function getSubjectPosts(Request $request)
    {

        if($request->id) {
            $subjectCategories = [$request->id];
        } else {
            $subjectCategories = $this->categoryRepository->where('name_en','!=','Editorials')->get()->pluck('id');
        }
        $blogs = $this->blogRepository->model->with(['thumbnail','category'])->whereIn('category_id',$subjectCategories)->paginate(20);
        $title = 'Information';
        return view('modules.blog.index', compact('blogs','title'));
    }

    public function show($id)
    {
        $post = $this->blogRepository->model->with('photos')->find($id);

        return view('modules.blog.view', compact('post'));
    }

}
