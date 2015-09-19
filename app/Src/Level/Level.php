<?php namespace App\Src\Level;

use App\Core\BaseModel;
use App\Core\LocaleTrait;
use App\Src\Question\Question;
use App\Src\User\User;

class Level extends BaseModel
{

    use LocaleTrait;

    protected $table = 'levels';

    protected $guarded = ['id'];

    protected $localeStrings = ['name', 'description'];


    /*********************************************************************************************************
     * Users
     ********************************************************************************************************/

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_levels');
    }

    public function usersCount()
    {
        return $this->belongsToMany(User::class, 'user_levels')
            ->selectRaw('count(users.id) as aggregate')
            ->groupBy('pivot_level_id');
    }

    // accessor for easier fetching the count
    public function getUsersCountAttribute()
    {
        if (!$this->relationLoaded('usersCount')) {
            $this->load('usersCount');
        }

        $related = $this->getRelation('usersCount')->first();

        return ($related) ? $related->aggregate : 0;
    }

    /*********************************************************************************************************
     * Questions
     ********************************************************************************************************/
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function latestQuestions()
    {
        return $this->questions()->latest()->limit(5);
    }

    public function questionsCount()
    {
        return $this->hasOne(Question::class)
            ->selectRaw('level_id, count(*) as aggregate')
            ->groupBy('level_id');
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
