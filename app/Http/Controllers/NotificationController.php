<?php

namespace App\Http\Controllers;

use App\Src\Notification\NotificationRepository;
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
        $user = Auth::user();
        $user->load('unreadNotifications');
        $notifications = $user->unreadNotifications;

//        foreach($notifications as $notification) {
//            dd($notification->notifiable->user);
//        }
        return view('modules.notification.index',compact('user','notifications'));
    }

}
