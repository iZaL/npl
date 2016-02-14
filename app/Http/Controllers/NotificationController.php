<?php

namespace App\Http\Controllers;

use App\Src\Answer\Answer;
use App\Src\Educator\Educator;
use App\Src\Notification\NotificationRepository;
use App\Src\Student\Student;
use Auth;

class NotificationController extends Controller
{
    /**
     * @var NotificationRepository
     */
    private $notificationRepository;

    /**
     * @param NotificationRepository $notificationRepository
     */
    public function __construct(NotificationRepository $notificationRepository)
    {
        $this->middleware('auth');
        $this->notificationRepository = $notificationRepository;
    }

    public function index()
    {
        $isEducator = false;
        $isStudent = false;
        $user = Auth::user();
        if(is_a($user->getType(),Educator::class)) {
            $isEducator = true;
        } elseif(is_a($user->getType(),Student::class)) {
            $isStudent = true;
        }
        $user->load('unreadNotifications');
        $notifications = $user->unreadNotifications()->latest()->get();
        $notifications->load('notifiable.question.user');

        return view('modules.notification.index',compact('user','notifications','isEducator','isStudent'));
    }

}
