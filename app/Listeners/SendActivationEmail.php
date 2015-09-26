<?php

namespace App\Listeners;

use App\Core\BaseMailer;
use App\Events\UserRegistered;
use App\Src\User\UserRepository;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendActivationEmail extends BaseMailer
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
        $this->mailer->subject = 'Activate your No-problem-learning.com Account';

        $this->mailer->toEmail = $user->email;
        $this->mailer->toName = $user->firstname;

        // Send Email
        $mailArray = [
            'link' => action('Auth\AuthController@getActivate', $user->activation_code),
            'name' => $user->firstname
        ];

        try {
            $this->mailer->fire($mailArray);
        } catch (\Exception $e) {
//            dd($e->getMessage());
        }
    }

}
