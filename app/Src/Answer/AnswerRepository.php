<?php namespace App\Src\Answer;

use App\Core\BaseRepository;
use App\Src\Educator\Educator;

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

    public function canAnswer($user, $question)
    {
        if (!is_a($user->getType(), Educator::class)) {
            return false;
        }

        $userSubjects = $user->subjects->modelKeys();
        $userLevels = $user->levels->modelKeys();

        if (!in_array($question->subject_id, $userSubjects)) {
            return false;
        }

        if (!in_array($question->level_id, $userLevels)) {
            return false;
        }

        return true;

    }

}