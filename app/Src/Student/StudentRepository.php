<?php namespace App\Src\Student;

use App\Core\BaseRepository;

class StudentRepository extends BaseRepository
{

    public $model;

    /**
     * Construct
     * @param Student $model
     */
    public function __construct(Student $model)
    {
        $this->model = $model;
    }

}