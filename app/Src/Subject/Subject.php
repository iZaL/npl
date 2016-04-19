<?php namespace App\Src\Subject;

use App\Core\BaseModel;
use App\Core\LocaleTrait;
use App\Src\Educator\Educator;
use App\Src\Question\Question;
use App\Src\User\User;
use Auth;
use Carbon\Carbon;

class Subject extends BaseModel
{

    use LocaleTrait;

    protected $table = 'subjects';

    protected $guarded = ['id'];

    protected $localeStrings = ['name', 'description'];

    /*********************************************************************************************************
     * Educator
     ********************************************************************************************************/

    public function educators()
    {
        return $this->belongsToMany(User::class, 'user_subjects');
    }

    public function educatorsCount()
    {
        return $this->belongsToMany(User::class, 'user_subjects')
            ->selectRaw('count(users.id) as aggregate')
            ->groupBy('pivot_subject_id');
    }

    // accessor for easier fetching the count
    public function getEducatorsCountAttribute()
    {
        if (!$this->relationLoaded('educatorsCount')) {
            $this->load('educatorsCount');
        }

        $related = $this->getRelation('educatorsCount')->first();

        return ($related) ? $related->aggregate : 0;
    }

    /*********************************************************************************************************
     *
     ********************************************************************************************************/

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

    /*********************************************************************************************************
     * Questions
     ********************************************************************************************************/

    public function questions()
    {
        return $this->hasMany(Question::class)
            ->where('created_at','>', Carbon::now()->subWeek()->toDateTimeString())

            ;
    }

    public function questionsCount()
    {
        return $this->hasOne(Question::class)
            ->where('created_at','>', Carbon::now()->subWeek()->toDateTimeString())
            ->selectRaw('subject_id, count(*) as aggregate')
            ->groupBy('subject_id');
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


    public function latestQuestions()
    {
        return $this->questions()->latest()->limit(5);
    }

}
