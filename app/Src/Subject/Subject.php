<?php namespace App\Src\Subject;

use App\Core\BaseModel;
use App\Core\LocaleTrait;
use App\Src\Question\Question;

class Subject extends BaseModel
{

    use LocaleTrait;

    protected $table = 'subjects';

    protected $guarded = ['id'];

    protected $localeStrings = ['name', 'description'];

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

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function latestQuestions()
    {
        return $this->questions()->latest()->limit(5);
    }
}
