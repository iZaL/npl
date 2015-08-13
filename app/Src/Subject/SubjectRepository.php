<?php namespace App\Src\Subject;

use App\Core\BaseRepository;

class SubjectRepository extends BaseRepository
{

    public $model;

    /**
     * Construct
     * @param Subject $model
     */
    public function __construct(Subject $model)
    {
        $this->model = $model;
    }

}