<?php

namespace App\Listeners;

use App\Core\BaseMailer;
use App\Events\EducatorAddedSubjects;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEducatorSubjectPendingAdminApprovalMail
{
    /**
     * @var BaseMailer
     */
    private $mailer;

    /**
     * Create the event listener.
     *
     * @param BaseMailer $mailer
     */
    public function __construct(BaseMailer $mailer)
    {
        //
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  EducatorAddedSubjects  $event
     * @return void
     */
    public function handle(EducatorAddedSubjects $event)
    {
        $user = $event->user;
        $this->mailer->view = 'emails.blank';
        $this->mailer->subject = 'Your Request to Add Subjects has been sent to Admin Reviewal';

        $this->mailer->toEmail = $user->email;
        $this->mailer->toName = $user->firstname;

        // Send Email
        $mailArray = [
            'body' => $user->firstname  .', Your Request to Answer Subjects  is sent to admin verification. You will be notified Shortly'
        ];

        $this->mailer->fire($mailArray);
    }
}
