<?php namespace App\Src\Question;

use App\Core\BaseModel;
use App\Core\LocaleTrait;
use App\Src\Answer\Answer;
use App\Src\Educator\Educator;
use App\Src\Level\Level;
use App\Src\Subject\Subject;
use App\Src\User\User;
use Auth;

class Question extends BaseModel
{

    use LocaleTrait;

    protected $table = 'questions';

    protected $guarded = ['id'];

    protected $localeStrings = ['body'];

    protected $morphClass = 'Question';

    public function notifications()
    {
        return $this->morphMany('App\Src\Notification\Notification', 'notifiable');
    }

    public function user()
    {
        return $this->belongsTo(User::class)->select(['id','np_code']);
    }

    public function photos()
    {
        return $this->morphMany('App\Src\Photo\Photo', 'imageable');
    }

    public function thumbnail()
    {
        return $this->morphOne('App\Src\Photo\Photo', 'imageable')->where('thumbnail', 1);
    }

    public function setSlugAttribute($value)
    {
        return $this->attributes['slug'] = slug($value);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    /*********************************************************************************************************
     * Answers
     ********************************************************************************************************/
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function parentAnswers()
    {
        return $this->hasMany(Answer::class)->where('parent_id', 0);
    }

    public function childAnswers()
    {
        return $this->answers()->where('parent_id', '!=', 0);
    }

    public function answersCount()
    {
        return $this->hasOne(Answer::class)
            ->selectRaw('question_id, count(*) as aggregate')
            ->groupBy('question_id');
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

    public function answeredEducatorsCount()
    {
        return $this->hasOne(Answer::class)
            ->selectRaw('question_id, count(DISTINCT(user_id)) as aggregate')
//            ->groupBy('user_id')
            ->groupBy('question_id');
    }

    public function getansweredEducatorsCountAttribute()
    {
        // if relation is not loaded already, let's do it first
        if (!$this->relationLoaded('answeredEducatorsCount')) {
            $this->load('answeredEducatorsCount');
        }

        $related = $this->getRelation('answeredEducatorsCount');

        // then return the count directly
        return ($related) ? (int)$related->aggregate : 0;
    }

}
