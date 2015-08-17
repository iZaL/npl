<?php namespace App\Src\Level;

use App\Core\BaseModel;
use App\Core\LocaleTrait;

class UserLevel extends BaseModel
{

    protected $table = 'user_levels';

    protected $guarded = ['id'];

}
