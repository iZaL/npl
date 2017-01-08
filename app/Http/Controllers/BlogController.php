<?php

namespace App\Http\Controllers;

use App\Src\Blog\BlogRepository;
use App\Src\Blog\Category;
use App\Src\Photo\PhotoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $this->middleware('auth', ['only' => 'create']);
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
        $blogs = $this->blogRepository->model->with(['thumbnail','category'])->whereIn('category_id',$ids)->latest()->paginate(20);
        $title = 'Editorials';
        return view('modules.blog.index', compact('blogs','title'));
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        if(!($user->isEducator() || $user->admin)) {
            return redirect()->home()->with('success','Wrong access');
        }

        $categories = $this->categoryRepository->where('name_en','!=','Editorials')->lists('name_en','id');

        return view('modules.blog.create', compact('user','categories'));

    }

    public function store(Request $request, PhotoRepository $photoRepository)
    {

        $this->validate($request, [
            'title_en'       => 'required',
            'description_en' => 'required',
            'cover'          => 'image',
            'category_id' => 'required|integer'
        ]);

        $blog = $this->blogRepository->model->create([
            'title_en'       => $request->title_en,
            'description_en' => $request->description_en,
            'user_id'        => Auth::user()->id,
            'slug'           => $request->title_en,
            'category_id' => $request->category_id
        ]);

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');

            $photoRepository->attach($file, $blog, ['thumbnail' => 1]);
        }

        return redirect()->back()->with('success','Article Saved');


    }

    public function getSubjectPosts(Request $request)
    {

        if($request->id) {
            $subjectCategories = [$request->id];
        } else {
            $subjectCategories = $this->categoryRepository->where('name_en','!=','Editorials')->get()->pluck('id');
        }
        $blogs = $this->blogRepository->model->with(['thumbnail','category'])->whereIn('category_id',$subjectCategories)->latest()->paginate(20);
        $title = 'Information';
        return view('modules.blog.index', compact('blogs','title'));
    }

    public function show($id)
    {
        $post = $this->blogRepository->model->with('photos')->find($id);

        return view('modules.blog.view', compact('post'));
    }

}
