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
            throw new \Exception('Your cannot answer this question. Not an educator');
        }

        $userSubjects = $user->subjects->modelKeys();
        $userLevels = $user->levels->modelKeys();

        if (!in_array($question->subject_id, $userSubjects)) {
            throw new \Exception('Your cannot answer this question. Subject not in ur list');
        }

        if (!in_array($question->level_id, $userLevels)) {
            throw new \Exception('Your cannot answer this question. Level not in ur list');
        }

        return true;

    }

}