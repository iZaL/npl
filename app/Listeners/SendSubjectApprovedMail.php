<?php

namespace App\Listeners;

use App\Core\BaseMailer;
use App\Events\SubjectRequestApproved;
use App\Events\UserRegistered;
use App\Src\User\UserRepository;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendSubjectApprovedMail
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
     * @param  SubjectRequestApproved $event
     * @return void
     */
    public function handle(SubjectRequestApproved $event)
    {
        $user = $event->user;
        $subjects = array_map('strtolower', $event->subjects);

        $this->mailer->view = 'emails.subject-approved';
        $this->mailer->subject = 'The Subject you requested have been Approved';
        $this->mailer->toEmail = $user->email;
        $this->mailer->toName = $user->firstname;

        // Send Email
        $mailArray = [
            'name' => $user->firstname,
            'subjects' => implode(',',$subjects)
        ];

        $this->mailer->fire($mailArray);

    }

}
