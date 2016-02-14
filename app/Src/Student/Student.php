<?php namespace App\Src\Student;

use App\Core\BaseModel;
use App\Src\Question\Question;
use App\Src\User\User;

class Student extends BaseModel
{
    protected $table = 'students';

    protected $guarded = ['id'];

    public function profile()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'user_id', 'user_id');
    }

    public function questionsCount()
    {
        return $this->hasOne(Question::class,'user_id','user_id')
            ->selectRaw('user_id, count(*) as aggregate')
            ->groupBy('user_id');
    }

    public function getQuestionsCountAttribute()
    {
        // if relation is not loaded already, let's do it first
        if (!$this->relationLoaded('questionsCount')) {
            $this->load('questionsCount');
        }

        $related = $this->getRelation('questionsCount');

        // then return the count directly
        return ($related) ? (int)$related->aggregate : 0;
    }
}

