<?php namespace App\Src\Question;

use App\Core\BaseRepository;

class QuestionRepository extends BaseRepository
{

    public $model;

    /**
     * Construct
     * @param Question $model
     */
    public function __construct(Question $model)
    {
        $this->model = $model;
    }

}