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

        if($user->isEducator()) {
            $isEducator = true;
        } elseif($user->isStudent()) {
            $isStudent = true;
        }

        $user
            ->load('notifications.notifiable')
            ->has('notifications.notifiable')
            ->latest()->get();

        return view('modules.notification.index',compact('user','isEducator','isStudent'));
    }

}
