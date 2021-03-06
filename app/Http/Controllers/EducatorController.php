<?php

namespace App\Http\Controllers;

use App\Src\Educator\Educator;
use App\Src\Educator\EducatorRepository;
use App\Src\Question\QuestionRepository;
use Illuminate\Support\Facades\Auth;

class EducatorController extends Controller
{
    /**
     * @var EducatorRepository
     */
    private $educatorRepository;

    /**
     * @param EducatorRepository $educatorRepository
     */
    public function __construct(EducatorRepository $educatorRepository)
    {
        $this->middleware('educator');
        $this->educatorRepository = $educatorRepository;
    }

    public function getAnswers()
    {
        $user = Auth::user();
        $educator = $user->getType();
        $answers = $educator->parentAnswers;
        return view('modules.educator.answers', compact('answers'));
    }

    /**
     * Recent Questions For an Educator
     * @param QuestionRepository $questionRepository
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function getQuestions(QuestionRepository $questionRepository)
    {
        // Check if the current user is an Educator
        // Get the recent 10 Questions For the Educator filtering by his subjects and levels

        $user = Auth::user();
        $subjectIds = $user->activeSubjects->modelKeys();
        $levelIds = $user->levels->modelKeys();

        $userNotificationsArray = $user->notifications->where('notifiable_type','MorphAnswer')->lists('notifiable_id')->toArray();

        // questions for the educator
        $questions = $questionRepository->model->with([
            'subject',
            'parentAnswers'=>function($q) use ($user) {
              $q->where('user_id',$user->id);
            },
            'parentAnswers.notifications' => function ($q) use ($user) {
                $q->where('user_id', $user->id)->latest();
            },
            'notifications' => function($q) use ($user) {
                $q->where('user_id', $user->id);
            },
            'parentAnswers.user'
        ])->whereIn('subject_id', $subjectIds)->whereIn('level_id',
            $levelIds)
            ->latest()
            ->get();

        return view('modules.educator.questions', compact('questions','user','userNotificationsArray'));
    }

}
