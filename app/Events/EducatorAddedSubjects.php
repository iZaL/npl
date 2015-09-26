<?php

namespace App\Events;

use App\Events\Event;
use App\Src\User\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class EducatorAddedSubjects extends Event
{
    use SerializesModels;
    /**
     * @var User
     */
    public $user;
    /**
     * @var array
     */
    public $subjects;

    /**
     * Create a new event instance.
     *
     * @param User $user
     * @param array $subjects
     */
    public function __construct(User $user, array $subjects)
    {
        //
        $this->user = $user;
        $this->subjects = $subjects;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
