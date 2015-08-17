<?php namespace App\Src\Answer;

use App\Core\BaseRepository;

class AnswerRepository extends BaseRepository
{

    public $model;

    /**
     * Construct
     * @param Answer $model
     */
    public function __construct(Answer $model)
    {
        $this->model = $model;
    }

}