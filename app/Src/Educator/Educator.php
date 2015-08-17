<?php namespace App\Src\Educator;

use App\Core\BaseModel;
use App\Core\LocaleTrait;
use App\Src\Question\Question;

class Educator extends BaseModel
{

    protected $table = 'educators';

    protected $guarded = ['id'];

}
