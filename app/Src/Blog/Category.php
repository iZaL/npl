<?php namespace App\Src\Blog;

use App\Core\BaseModel;
use App\Core\LocaleTrait;

class Category extends BaseModel
{

    use LocaleTrait;

    protected $table = 'categories';

    protected $guarded = ['id'];

    protected $localeStrings = ['name'];

    public function blog()
    {
        return $this->hasMany(Blog::class);
    }
}
