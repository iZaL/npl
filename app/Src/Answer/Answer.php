<?php namespace App\Src\Answer;

use App\Core\BaseModel;
use App\Core\LocaleTrait;
use App\Src\Question\Question;
use App\Src\User\User;

class Answer extends BaseModel
{

    use LocaleTrait;

    protected $table = 'answers';

    protected $guarded = ['id'];

    protected $localeStrings = ['body'];

    protected $morphClass = 'MorphAnswer';

    protected $with = ['user'];

    public function notifications()
    {
        return $this->morphMany('App\Src\Notification\Notification', 'notifiable')->where('read',0);
    }

    public function allNotifications()
    {
        return $this->morphMany('App\Src\Notification\Notification', 'notifiable');
    }


//    public function unreadNotifications()
//    {
//        return $this->notifications()->where('read',0);
//    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->select(['id','np_code']);
    }

    public function parentAnswers()
    {
        return $this->hasMany(self::class, 'id')->where('parent_id', 0)->latest();
    }

    public function childAnswers()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function recentReply()
    {
        return $this->hasOne(self::class, 'parent_id')->latest();
    }

    public function childAnswersCount()
    {
        return $this->hasOne(self::class,'parent_id')
            ->selectRaw('parent_id, count(*) as aggregate')
            ->groupBy('parent_id');
    }

    public function getChildAnswersCountAttribute()
    {
        // if relation is not loaded already, let's do it first
        if (!$this->relationLoaded('childAnswersCount')) {
            $this->load('childAnswersCount');
        }

        $related = $this->getRelation('childAnswersCount');

        // then return the count directly
        return ($related) ? (int)$related->aggregate : 0;
    }



    public function isParent()
    {
        return $this->parent_id == 0 ? true :false;
    }

}
