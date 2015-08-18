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

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function childAnswers()
    {
        return $this->hasMany(Answer::class,'parent_id');
    }
}
