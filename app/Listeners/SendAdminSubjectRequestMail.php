<?php

namespace App\Listeners;

use App\Core\BaseMailer;
use App\Events\EducatorAddedSubjects;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendAdminSubjectRequestMail
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
        //@todo: send admin email
    }
}
