<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Src\Educator\Educator;
use App\Src\Subject\SubjectRepository;
use Illuminate\Http\Request;

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

    public function index()
    {
        $subjects = $this->subjectRepository->model->with(['questionsCount','educatorsCount'])->paginate(100);

        return view('admin.modules.subject.index', compact('subjects'));

    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        return redirect()->back()->with('info', 'Method Not Yet Implemented');
    }

    public function create()
    {
        return view('admin.modules.subject.create');

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name_en' => 'required|unique:subjects,name_en'
        ]);

        $this->subjectRepository->model->create([
            'name_en'        => $request->name_en,
            'description_en' => $request->description_en,
            'slug'           => $request->name_en
        ]);

        return redirect()->action('Admin\SubjectController@index')->with('success', 'Subject Created');
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $subject = $this->subjectRepository->model->find($id);

        return view('admin.modules.subject.edit', compact('subject'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name_en' => 'required|unique:subjects,name_en,'.$id
        ]);

        $subject = $this->subjectRepository->model->find($id);

        $subject->update([
            'name_en'        => $request->name_en,
            'description_en' => $request->description_en,
            'slug'           => $request->name_en
        ]);

        return redirect()->action('Admin\SubjectController@index')->with('success', 'Subject Updated');

    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // delete whole questions and answers
        // unsync subjects for educators

        $subject = $this->subjectRepository->model->find($id);

        // delete questions and answers related to the subject
        foreach ($subject->questions as $question) {
            $question->answers()->delete();
        }

        $subject->questions()->delete();

        // unsync educators from the subjects table
        $subject->educators()->detach();

        $subject->delete();

        return redirect()->action('Admin\SubjectController@index')->with('success', 'Subject Deleted');
    }

}
