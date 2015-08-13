<?php namespace App\Src\Level;

use App\Core\BaseRepository;

class LevelRepository extends BaseRepository
{

    public $model;

    /**
     * Construct
     * @param Level $model
     */
    public function __construct(Level $model)
    {
        $this->model = $model;
    }

}