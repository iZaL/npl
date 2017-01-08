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
        $this->middleware('auth', ['except' => 'index','getSubjectPosts','show']);
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
        $blogs = $this->blogRepository->model->with(['thumbnail','category'])->whereIn('category_id',$ids)
            ->where('active',1)
            ->latest()->paginate(20);
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

    public function edit($id)
    {
        $user = Auth::user();
        $blog = $this->blogRepository->model->find($id);

        if(!($blog->user_id == $user->id || $user->admin )) {
            return redirect()->home()->with('success','Wrong access');
        }

        $categories = $this->categoryRepository->where('name_en','!=','Editorials')->lists('name_en','id');
        return view('modules.blog.edit', compact('user','blog','categories'));
    }

    public function store(Request $request, PhotoRepository $photoRepository)
    {
        $user = Auth::user();
        $this->validate($request, [
            'title_en'       => 'required',
            'description_en' => 'required',
            'cover'          => 'image',
            'category_id' => 'required|integer'
        ]);

        $blog = $this->blogRepository->model->create([
            'title_en'       => $request->title_en,
            'description_en' => $request->description_en,
            'user_id'        => $user->id,
            'slug'           => $request->title_en,
            'category_id' => $request->category_id
        ]);

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');

            $photoRepository->attach($file, $blog, ['thumbnail' => 1]);
        }

        return redirect()->action('ProfileController@getArticles',[$user->id])->with('message', 'success');


    }

    public function update(Request $request, PhotoRepository $photoRepository, $id)
    {
        $user = Auth::user();

        $this->validate($request, [
            'title_en'       => 'required',
            'description_en' => 'required',
            'cover'          => 'image',
            'category_id' => 'required|integer'
        ]);

        $blog = $this->blogRepository->model->find($id);

        $blog->update(array_merge(['slug' => $request->title_en], $request->except('cover')));

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $photoRepository->replace($file, $blog, ['thumbnail' => 1], $id);
        }

        return redirect()->action('ProfileController@getArticles',[$user->id])->with('message', 'success');

    }


    public function getSubjectPosts(Request $request)
    {

        if($request->id) {
            $subjectCategories = [$request->id];
        } else {
            $subjectCategories = $this->categoryRepository->where('name_en','!=','Editorials')->get()->pluck('id');
        }
        $blogs = $this->blogRepository->model->with(['thumbnail','category'])
            ->where('active',1)
            ->whereIn('category_id',$subjectCategories)->latest()->paginate(20);
        $title = 'Information';

        return view('modules.blog.index', compact('blogs','title'));
    }


    public function show($id)
    {
        $post = $this->blogRepository->model->with('photos')
            ->where('active',1)
            ->find($id);

        return view('modules.blog.view', compact('post'));
    }

}
