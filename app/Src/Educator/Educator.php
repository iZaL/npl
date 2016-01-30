<?php namespace App\Src\Educator;

use App\Core\BaseModel;
use App\Core\LocaleTrait;
use App\Src\Answer\Answer;
use App\Src\User\User;

class Educator extends BaseModel
{

    use LocaleTrait;
    protected $table = 'educators';

    protected $guarded = ['id'];

    public $localeStrings = ['qualification','experience'];

    public function profile()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class, 'user_id', 'user_id');
    }

    public function answersCount()
    {
        return $this->hasOne(Answer::class, 'user_id', 'user_id')
            ->selectRaw('user_id, count(*) as aggregate')
            ->groupBy('user_id');
    }

    public function getAnswersCountAttribute()
    {
        // if relation is not loaded already, let's do it first
        if (!$this->relationLoaded('answersCount')) {
            $this->load('answersCount');
        }

        $related = $this->getRelation('answersCount');

        // then return the count directly
        return ($related) ? (int)$related->aggregate : 0;
    }

    public function parentAnswers()
    {
        return $this->hasMany(Answer::class, 'user_id', 'user_id')->where('parent_id', 0);
    }
}
