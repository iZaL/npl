<?php
namespace App\Src\Notification;

use App\Core\BaseModel;

class Notification extends BaseModel
{

    public static $name = 'notification';

    protected $guarded = ['id'];

    protected $hidden = [];

    protected $table = 'notifications';

    protected $types = [
        'answer'    => 'App\Src\Answer\Answer',
        'question' => 'App\Src\Question\Question'
    ];

    public function notifiable()
    {
        return $this->morphTo();
    }

    public function getNotifiableTypeAttribute($type)
    {
        $type = strtolower($type);
        return array_get($this->types, $type, $type);
    }

    public function markAsRead()
    {
        $this->read = 1;
        $this->save();
    }

    public function markAsUnread()
    {
        $this->read = 0;
        $this->save();
    }

}