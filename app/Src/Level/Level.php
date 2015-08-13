<?php namespace App\Src\Level;

use App\Core\BaseModel;
use App\Core\LocaleTrait;

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
}
