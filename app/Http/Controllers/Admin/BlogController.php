<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBlogPostRequest;
use App\Jobs\CreateBlogPost;
use App\Src\Blog\BlogCategory;
use App\Src\Blog\BlogRepository;
use App\Src\Blog\Category;
use App\Src\Photo\PhotoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{

    /**
     * @var $blogRepository
     */
    private $blogRepository;
    /**
     * @var Category
     */
    private $category;

    /**
     * @param BlogRepository $blogRepository
     * @param Category $category
     * @internal param BlogCategory $blogCategory
     */
    public function __construct(BlogRepository $blogRepository, Category $category)
    {
        $this->blogRepository = $blogRepository;
        $this->category = $category;
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
        $blogs = $this->blogRepository->model->with(['category'])->paginate(100);

        return view('admin.modules.blog.index', compact('blogs'));
    }

    public function show($id)
    {
        $blog = $this->blogRepository->model->with('photos')->find($id);

        return view('admin.modules.blog.view', compact('blog'));
    }

    public function create()
    {
        $categories = $this->category->lists('name_en','id');
        return view('admin.modules.blog.create',compact('categories'));
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

        return redirect('admin/blog')->with('message', 'success');
    }

    public function edit($id)
    {
        $blog = $this->blogRepository->model->with('photos')->find($id);
        $categories = $this->category->lists('name_en','id');
        return view('admin.modules.blog.edit', compact('blog','categories'));
    }

    /**
     * @param Request $request
     * @param PhotoRepository $photoRepository
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, PhotoRepository $photoRepository, $id)
    {
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

        return redirect('admin/blog')->with('message', 'success');

    }

    public function destroy($id)
    {
        $blog = $this->blogRepository->model->find($id);
        $blog->delete();

        return redirect()->back()->with('success', 'Record Deleted');
    }
}
