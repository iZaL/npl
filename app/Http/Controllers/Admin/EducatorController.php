<?php

namespace App\Http\Controllers\Admin;


use App\Events\SubjectRequestApproved;
use App\Http\Controllers\Controller;
use App\Src\Educator\Educator;
use App\Src\Educator\EducatorRepository;
use App\Src\Level\LevelRepository;
use App\Src\Subject\SubjectRepository;
use App\Src\User\UserRepository;
use Illuminate\Http\Request;

class EducatorController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var StudentRepository
     */
    private $educatorRepository;
    /**
     * @var SubjectRepository
     */
    private $subjectRepository;
    /**
     * @var LevelRepository
     */
    private $levelRepository;

    /**
     * @param UserRepository $userRepository
     * @param EducatorRepository $educatorRepository
     * @param SubjectRepository $subjectRepository
     * @param LevelRepository $levelRepository
     * @internal param EducatorRepository $studentRepository
     */
    public function __construct(
        UserRepository $userRepository,
        EducatorRepository $educatorRepository,
        SubjectRepository $subjectRepository,
        LevelRepository $levelRepository
    ) {
        $this->userRepository = $userRepository;
        $this->educatorRepository = $educatorRepository;
        $this->subjectRepository = $subjectRepository;
        $this->levelRepository = $levelRepository;
    }

    public function index(Request $request)
    {
        $selectedSubject = $request->subject ? : '';
        $selectedLevel = $request->level ? : '';

        $educators = $this->educatorRepository->model->with(['profile']);

        $selectedSubject ? $educators->whereHas('profile.subjects',function($q) use ($request) {
            $q->where('subjects.id',$request->subject);
        }) : '';

        $selectedLevel ? $educators->whereHas('profile.levels',function($q) use ($request) {
            $q->where('levels.id',$request->level);
        }) : '';

        $educators = $educators->paginate(100);

        $subjects = [''=>'all subjects']+$this->subjectRepository->model->lists('name_en', 'id')->toArray();
        $levels = [''=>'all levels']+$this->levelRepository->model->lists('name_en', 'id')->toArray();

        return view('admin.modules.educator.index',compact('educators','selectedSubject','selectedLevel','subjects','levels'));

    }

    public function show($id)
    {
        // Find newly Registered Educators and their Subjects to Approve
        $educator = $this->educatorRepository->model->with([
            'profile.activeSubjects',
            'profile.inActiveSubjects',
            'answersCount'
        ])->latest()->find($id);

//        $subjects = $this->subjectRepository->model->get(['id', 'name_en']);
//        $subjects = $educator->profile->inActiveSubjects()->get(['id', 'name_en']);
//        dd($subjects);
        return view('admin.modules.educator.view', compact('educator', 'subjects'));
    }

    public function activateSubjects(Request $request, $id)
    {
        $educator = $this->educatorRepository->model->find($id);

        if ($request->subjects) {
            $subjectNames = $this->subjectRepository->model->whereIn('id',$request->subjects)->lists('name_en')->toArray();

            foreach ($request->subjects as $subject) {

                // Check  whether the Subject is not already active
                if (!in_array($subject, $educator->profile->activeSubjects->modelKeys())) {

                    // remove where active = 0 , to avoid duplicate records
                    $educator->profile->subjects()->detach($subject);

                    // create a new record with active set to 1
                    $educator->profile->subjects()->attach($subject, ['active' => '1']);

                    // fire a new email
                }
            }

            event(new SubjectRequestApproved($educator->profile, (array)$subjectNames));

        }

        // delete in active subjects
        $educator->profile->inActiveSubjects()->detach();

        return redirect()->back()->with('success', 'Educator\'s Subjects updated');
    }

    public function deActivateSubjects(Request $request, $id)
    {
        $educator = $this->educatorRepository->model->with(['answers.question'])->find($id);

        // Find the deleted subjects by comparing the active subjects and the get request
        $educatorSubjects = collect($educator->profile->activeSubjects->modelKeys());

        $deletedSubjects = $educatorSubjects->diff($request->subjects);

        // find and delete all the answers for the educator for the subject that was de-activated
        $educatorAnswersForDeletedSubjects = $this->educatorRepository->model->with([
            'answers.question' => function ($q) use ($deletedSubjects) {
                $q->whereIn('questions.subject_id', $deletedSubjects);
            }
        ])->find($id);


        $educatorAnswersForDeletedSubjects->answers()->delete();

        // sync with database results only the subjects in get request (active subjects) and delete the rest(inactive).
        if ($request->subjects) {
            $educator->profile->activeSubjects()->sync($request->subjects);

        } else {
            // Empty Array, Delete all
            $educator->profile->activeSubjects()->detach();
        }

        return redirect()->back()->with('success', 'Educator\'s Subjects updated');
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $educator = $this->educatorRepository->model->with([
            'profile',
            'profile.levels',
            'profile.subjects'
        ])->find($id);

        // delete answers
        $educator->answers ? $educator->answers()->delete() : '';

        $educator->profile->subjects()->detach();

        // delete levels
        $educator->profile->levels()->detach();

        // delete as student
        $educator->delete();

        return redirect()->back()->with('success', 'Educator Removed');
    }

}
