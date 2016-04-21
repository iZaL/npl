<?php
namespace App\Src\Notification;

use App\Core\BaseModel;
use App\Src\Answer\Answer;
use App\Src\Question\Question;
use App\Src\User\User;

class Notification extends BaseModel
{

    public static $name = 'notification';

    protected $guarded = ['id'];

    protected $hidden = [];

    protected $table = 'notifications';

    protected $with = ['user','notifiable'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function notifiable()
    {
        return $this->morphTo();
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
