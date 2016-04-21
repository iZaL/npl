<?php
namespace App\Http\Composers;

use App\Src\Category\CategoryRepository;
use App\Src\Educator\Educator;
use App\Src\Level\LevelRepository;
use App\Src\Notification\NotificationRepository;
use App\Src\Student\Student;
use App\Src\Subject\SubjectRepository;
use Auth;
use Illuminate\Contracts\View\View;

class NotificationCount
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
        $this->notificationRepository = $notificationRepository;
    }

    public function compose(View $view)
    {

        $notificationsCount = 0 ;
        if(Auth::check()) {
            $user = Auth::user();
            $user->with('notificationsCount');
            $notificationsCount = $user->notificationsCount;
        }
        $view->with(['notificationsCount'=>$notificationsCount]);
    }

}