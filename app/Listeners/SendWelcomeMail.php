<?php

namespace App\Listeners;

use App\Core\BaseMailer;
use App\Events\UserActivated;
use App\Events\UserRegistered;
use App\Src\User\UserRepository;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendWelcomeMail
{

    /**
     * @var UserRepository
     */
    private $userRepository;

    protected $mailer;

    /**
     * @param UserRepository $userRepository
     * @param BaseMailer $mailer
     */
    public function __construct(UserRepository $userRepository, BaseMailer $mailer)
    {
        $this->userRepository = $userRepository;
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  UserActivated $event
     * @return void
     */
    public function handle(UserActivated $event)
    {
        $user = $event->user;
        $this->mailer->view = 'emails.auth.welcome';
        $this->mailer->subject = 'Your No Problem Learning Account has got activated';

        $this->mailer->toEmail = $user->email;
        $this->mailer->toName = $user->firstname;

        // Send Email
        $mailArray = [
            'link'    => action('Auth\AuthController@getLogin'),
            'name'    => $user->firstname,
            'email'   => $user->email,
            'npCode' => $user->np_code
        ];

        $this->mailer->fire($mailArray);

    }

}
