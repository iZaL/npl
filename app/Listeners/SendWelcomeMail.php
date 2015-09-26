<?php

namespace App\Listeners;

use App\Core\BaseMailer;
use App\Events\UserRegistered;
use App\Src\User\UserRepository;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendWelcomeMail extends BaseMailer
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
        //
        $this->userRepository = $userRepository;
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  UserRegistered $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        $user = $event->user;
        $this->mailer->view = 'emails.auth.welcome';
        $this->mailer->subject = 'Your NPL Account has got Activated';

        $this->mailer->toEmail = $user->email;
        $this->mailer->toName = $user->firstname;

        // Send Email
        $mailArray = [
            'link'    => action('Auth\AuthController@getLogin'),
            'name'    => $user->firstname,
            'email'   => $user->email,
            'np_code' => $user->np_code
        ];

        $this->mailer->fire($mailArray);

    }

}
