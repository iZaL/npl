<?php namespace App\Src\Educator;

use App\Core\BaseModel;
use App\Core\LocaleTrait;
use App\Src\Answer\Answer;
use App\Src\Question\Question;

class Educator extends BaseModel
{

    protected $table = 'educators';

    protected $guarded = ['id'];

    public function answers()
    {
        return $this->hasMany(Answer::class, 'user_id');
    }

    public function parentAnswers()
    {
        return $this->hasMany(Answer::class, 'user_id')->where('parent_id', 0);
    }
}
