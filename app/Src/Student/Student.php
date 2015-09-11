<?php namespace App\Src\Student;

use App\Core\BaseModel;
use App\Core\LocaleTrait;
use App\Src\Question\Question;

class Student extends BaseModel
{

    protected $table = 'students';

    protected $guarded = ['id'];

    public function questions()
    {
        return $this->hasMany(Question::class, 'user_id','user_id');
    }

}

