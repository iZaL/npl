<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class AdminAnswerControllerTest extends TestCase
{

    use DatabaseTransactions;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();
    }

    public function testIndex()
    {
        $questionBody = uniqid();
        $answerBody = uniqid();
        $subjectID = 1;

        $student = $this->createStudent([],[1],[1]); // student
        $studentLevel = $student->levels->last();

        $educator = $this->createEducator([],[1],[1]);

        $question = factory('App\Src\Question\Question')->create([
            'body_en'    => $questionBody,
            'user_id'    => $student->id,
            'subject_id' => $subjectID,
            'level_id'   => $studentLevel->id
        ]);

        $answer = factory('App\Src\Answer\Answer')->create([
            'question_id' => $question->id,
            'user_id'     => $educator->id,
            'body_en'     => $answerBody,
            'parent_id'   => 0
        ]);

        $answers = factory('App\Src\Answer\Answer',5)->create([
            'question_id' => $question->id,
            'user_id'     => $educator->id,
            'body_en'     => $answerBody,
            'parent_id'   => $answer->id
        ]);

        $admin = $this->createUser(['admin'=>1],[],[]);
        $this->actingAs($admin)
            ->visit('/admin/answer')
            ->see($answerBody)
        ;

    }

    public function testDelete()
    {
        $questionBody = uniqid();
        $answerBody = uniqid();
        $subjectID = 1;
        $student = $this->createStudent([],[1],[1]); // student
        $educator = $this->createEducator([],[1],[1]);

        $studentLevel = $student->levels->last();

        $question = factory('App\Src\Question\Question')->create([
            'body_en'    => $questionBody,
            'user_id'    => $student->id,
            'subject_id' => $subjectID,
            'level_id'   => $studentLevel->id
        ]);

        $answer = factory('App\Src\Answer\Answer')->create([
            'question_id' => $question->id,
            'user_id'     => $educator->id,
            'body_en'     => $answerBody,
            'parent_id'   => 0
        ]);

        $answers = factory('App\Src\Answer\Answer',5)->create([
            'question_id' => $question->id,
            'user_id'     => $educator->id,
            'body_en'     => $answerBody,
            'parent_id'   => $answer->id
        ]);

        $notification = factory('App\Src\Notification\Notification',1)->create([
            'notifiable_type' => 'MorphAnswer',
            'user_id'     => $educator->id,
            'notifiable_id'     => $answer->id
        ]);

        $admin = $this->createUser(['admin'=>1],[],[]);
        $this->actingAs($admin);
        $this->call('DELETE', '/admin/answer/' . $answer->id);
        $this->notSeeInDatabase('answers', ['id' => $answers->first()->id]);
        $this->notSeeInDatabase('answers', ['id' => $answers->last()->id]);
        $this->notSeeInDatabase('notifications', ['id' => $notification->id]);
    }
}
