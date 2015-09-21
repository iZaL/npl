<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Src\Educator\EducatorRepository;
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
     * @param UserRepository $userRepository
     * @param EducatorRepository $educatorRepository
     * @param SubjectRepository $subjectRepository
     * @internal param EducatorRepository $studentRepository
     */
    public function __construct(
        UserRepository $userRepository,
        EducatorRepository $educatorRepository,
        SubjectRepository $subjectRepository
    ) {
        $this->userRepository = $userRepository;
        $this->educatorRepository = $educatorRepository;
        $this->subjectRepository = $subjectRepository;
    }

    public function aa()
    {
     dd('aa');
    }

    public function index()
    {
        // Find newly Registered Educators and their Subjects to Approve
        $educators = $this->educatorRepository->model->with([
            'profile.activeSubjects',
            'profile.inActiveSubjects',
            'answersCount'
        ])->latest()->paginate(100);

        $subjects = $this->subjectRepository->model->get(['id', 'name_en']);

        return view('admin.modules.educator.index', compact('educators', 'subjects'));
    }

    public function show($id)
    {
        return redirect()->back()->with('info', 'Method Not Yet Implemented');
    }

    public function activateSubjects(Request $request, $id)
    {
        $educator = $this->educatorRepository->model->find($id);

        if ($request->subjects) {

            foreach ($request->subjects as $subject) {

                // Check  whether the Subject is not already active
                if (!in_array($subject, $educator->profile->activeSubjects->modelKeys())) {

                    // remove where active = 0 , to avoid duplicate records
                    $educator->profile->subjects()->detach($subject);

                    // create a new record with active set to 1
                    $educator->profile->subjects()->attach($subject, ['active' => '1']);
                }
            }

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
