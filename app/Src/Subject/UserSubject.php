<?php namespace App\Src\Subject;

use App\Core\BaseModel;
use App\Core\LocaleTrait;

class UserSubject extends BaseModel
{

    protected $table = 'user_subjects';

    protected $guarded = ['id'];

}
