<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Src\Level\LevelRepository;
use App\Src\Subject\SubjectRepository;
use Illuminate\Http\Request;

class LevelController extends Controller
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
     * @param LevelRepository $levelRepository
     * @param SubjectRepository $subjectRepository
     */
    public function __construct(LevelRepository $levelRepository, SubjectRepository $subjectRepository)
    {
        $this->subjectRepository = $subjectRepository;
        $this->levelRepository = $levelRepository;
    }

    public function index()
    {
        $levels = $this->levelRepository->model->with(['questionsCount','usersCount'])->paginate(100);

        return view('admin.modules.level.index', compact('levels'));

    }

    public function show($id)
    {

    }

    public function create()
    {
        return view('admin.modules.level.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name_en' => 'required|unique:levels,name_en'
        ]);

        $this->levelRepository->model->create([
            'name_en'        => $request->name_en,
            'description_en' => $request->description_en,
            'slug'           => $request->name_en
        ]);

        return redirect()->action('Admin\LevelController@index')->with('success', 'Level Created');
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $level = $this->levelRepository->model->find($id);

        return view('admin.modules.level.edit', compact('level'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name_en' => 'required|unique:levels,name_en'
        ]);

        $subject = $this->levelRepository->model->find($id);

        $subject->update([
            'name_en'        => $request->name_en,
            'description_en' => $request->description_en,
            'slug'           => $request->name_en
        ]);

        return redirect()->action('Admin\LevelController@index')->with('success', 'Level Updated');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // delete whole questions and answers
        // unsync levels for users

        $level = $this->levelRepository->model->find($id);

        // delete questions and answers related to the subject
        foreach ($level->questions as $question) {
            foreach ($question->answers as $answer) {
                $answer->delete();
            }
            $question->delete();
        }

        // unsync educators from the subjects table
        $users = $level->users->modelKeys();
        $level->users()->detach($users);

        $level->delete();

        return redirect()->action('Admin\LevelController@index')->with('success', 'Level Deleted');
    }

}
