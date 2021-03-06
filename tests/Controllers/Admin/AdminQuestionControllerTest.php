<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class AdminQuestionControllerTest extends TestCase
{

    use DatabaseTransactions;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();
    }
//
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

        $answer = factory('App\Src\Answer\Answer', 10)->create([
            'question_id' => $question->id,
            'user_id'     => $educator->id,
            'body_en'     => $answerBody,
        ]);

        $admin = $this->createUser(['admin'=>1],[],[]);
        $this->actingAs($admin)
            ->visit('/admin/question')
            ->see($question->body_en);

    }

    public function testDelete()
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

        $answer = factory('App\Src\Answer\Answer', 1)->create([
            'question_id' => $question->id,
            'user_id'     => $educator->id,
            'body_en'     => $answerBody,
        ]);
//
        $answerChild = factory('App\Src\Answer\Answer', 5)->create([
            'question_id' => $question->id,
            'user_id'     => $educator->id,
            'parent_id' => $answer->id,
            'body_en'     => $answerBody,
        ]);

        $notification = factory('App\Src\Notification\Notification',1)->create([
            'notifiable_type' => 'MorphAnswer',
            'user_id'     => $student->id,
            'notifiable_id'     => $answer->id
        ]);

        $notification2 = factory('App\Src\Notification\Notification',1)->create([
            'notifiable_type' => 'MorphAnswer',
            'user_id'     => $student->id,
            'notifiable_id'     => $answerChild->first()->id
        ]);

        $notification3 = factory('App\Src\Notification\Notification',1)->create([
            'notifiable_type' => 'MorphAnswer',
            'user_id'     => $educator->id,
            'notifiable_id'     => $answerChild->last()->id
        ]);

        $admin = $this->createUser(['admin'=>1],[],[]);
        $this->actingAs($admin);
        $this->call('DELETE', '/admin/question/' . $question->id);
        $this->notSeeInDatabase('questions', ['id' => $question->id]);
        $this->notSeeInDatabase('answers', ['id' => $answer->id]);
        $this->notSeeInDatabase('answers', ['id' => $answerChild->first()->id]);
        $this->notSeeInDatabase('answers', ['id' => $answerChild->last()->id]);
        $this->notSeeInDatabase('notifications', ['id' => $notification->id]);
        $this->notSeeInDatabase('notifications', ['id' => $notification2->id]);
        $this->notSeeInDatabase('notifications', ['id' => $notification3->id]);
        $this->followRedirects()->see('Question Deleted');
    }

}
