<?php namespace App\Src\Question;

use App\Core\BaseModel;
use App\Core\LocaleTrait;

class Question extends BaseModel
{

    use LocaleTrait;

    protected $table = 'questions';

    protected $guarded = ['id'];

    protected $localeStrings = ['body'];

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
}
