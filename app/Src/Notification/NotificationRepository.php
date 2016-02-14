<?php
namespace App\Src\Notification;

use App\Core\BaseRepository;

class NotificationRepository extends BaseRepository
{

    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    public $model;

    /**
     * Construct
     *
     * @internal param \Illuminate\Database\Eloquent\Model $model
     * @param Notification $model
     */
    public function __construct(Notification $model)
    {
        $this->model = $model;
    }

}