<?php namespace App\Src\Educator;

use App\Core\BaseRepository;

class EducatorRepository extends BaseRepository
{

    public $model;

    /**
     * Construct
     * @param Educator $model
     */
    public function __construct(Educator $model)
    {
        $this->model = $model;
    }

}