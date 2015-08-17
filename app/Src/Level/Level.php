<?php namespace App\Src\Level;

use App\Core\BaseModel;
use App\Core\LocaleTrait;
use App\Src\Question\Question;

class Level extends BaseModel
{

    use LocaleTrait;

    protected $table = 'levels';

    protected $guarded = ['id'];

    protected $localeStrings = ['name', 'description'];


    public function users()
    {
        return $this->belongsToMany('App\Src\User\User', 'user_level');
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function latestQuestions()
    {
        return $this->questions()->latest()->limit(5);
    }
}
