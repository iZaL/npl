<?php

namespace App\Listeners;

use App\Core\BaseMailer;
use App\Events\UserRegistered;
use App\Src\User\UserRepository;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendActivationMail
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
        $this->mailer->view = 'emails.auth.activation';
        $this->mailer->subject = 'Activate your No Problem Learning  account';

        $this->mailer->toEmail = $user->email;
        $this->mailer->toName = $user->firstname;

        // Send Email
        $mailArray = [
            'link' => action('Auth\AuthController@getActivate', $user->activation_code),
            'name' => $user->firstname
        ];

        $this->mailer->fire($mailArray);

    }

}
