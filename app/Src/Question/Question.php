<?php namespace App\Src\Question;

use App\Core\BaseModel;
use App\Core\LocaleTrait;
use App\Src\Level\Level;
use App\Src\Subject\Subject;

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

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
