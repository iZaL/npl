<?php

namespace App\Providers;

use App\Events\EducatorAddedSubjects;
use App\Events\UserActivated;
use App\Events\UserRegistered;
use App\Listeners\CreateUserCode;
use App\Listeners\SendActivationMail;
use App\Listeners\SendAdminSubjectRequestMail;
use App\Listeners\SendEducatorSubjectPendingAdminApprovalMail;
use App\Listeners\SendWelcomeMail;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        UserRegistered::class => [
            CreateUserCode::class,
            SendActivationMail::class
        ],
        UserActivated::class => [
            SendWelcomeMail::class
        ],
        EducatorAddedSubjects::class => [
//            SendAdminSubjectRequestMail::class,
//            SendEducatorSubjectPendingAdminApprovalMail::class
        ]
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);
    }
}
