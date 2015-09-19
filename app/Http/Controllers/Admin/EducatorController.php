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

    public function index()
    {
        $educators = $this->educatorRepository->model->with(['profile', 'answersCount'])->paginate(100);

        return view('admin.modules.educator.index', compact('educators'));
    }

    public function show($id)
    {

    }

    public function deActivateSubjects(Request $request, $id)
    {
        $educator = $this->educatorRepository->model->with(['answers.question'])->find($id);

        $educatorSubjects = collect($educator->profile->activeSubjects->modelKeys());

        $deletedSubjects = $educatorSubjects->diff($request->subjects);


        $educatorAnswersForDeletedQuestions = $this->educatorRepository->model->with([
            'answers.question' => function ($q) use ($deletedSubjects) {
                $q->whereIn('questions.subject_id', $deletedSubjects);
            }
        ])->find($id);

        foreach ($educatorAnswersForDeletedQuestions->answers as $answer) {
            $answer->delete();
        }

        if ($request->subjects) {
            $educator->profile->activeSubjects()->sync($request->subjects);

        } else {
            // Empty Array, Delete all
            $educator->profile->activeSubjects()->detach();
        }

        return redirect()->back()->with('success', 'Educator\'s Subjects updated');
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
                    $educator->profile->subjects()->attach($subject, ['active' => 1]);
                }
            }

            $deletingSubjects = $educator->profile->inActiveSubjects->modelKeys();
            foreach ($deletingSubjects as $subject) {
                $educator->profile->subjects()->detach($subject);
            }

        } else {
            // if empty
            // find all the inactive and delete
            $deletingSubjects = $educator->profile->inActiveSubjects->modelKeys();
            foreach ($deletingSubjects as $subject) {
                $educator->profile->subjects()->detach($subject);
            }
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

        // delete questions
        foreach ($educator->answers as $answer) {
            $answer->delete();
        }

        $subjects = $educator->profile->subjects->modelKeys();
        $educator->profile->subjects()->detach($subjects);

        // delete levels
        $levels = $educator->profile->levels->modelKeys();
        $educator->profile->levels()->detach($levels);

        // delete as student
        $educator->delete();

        return redirect()->back()->with('success', 'Educator Removed');
    }

}
