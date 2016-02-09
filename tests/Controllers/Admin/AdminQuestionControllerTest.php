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

    public function testIndex()
    {
        $questionBody = uniqid();
        $answerBody = uniqid();
        $subjectID = 2;

        $student = Auth::loginUsingId(3); // student
        $studentLevel = $student->levels->last();

        $educator = Auth::loginUsingId(2);

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

        $this->actingAs(Auth::loginUsingId(1))
            ->visit('/admin/question')
            ->see($question->body_en);

    }

    public function testDelete()
    {
        $questionBody = uniqid();
        $answerBody = uniqid();
        $subjectID = 2;

        $student = Auth::loginUsingId(3); // student
        $studentLevel = $student->levels->last();

        $educator = Auth::loginUsingId(2);

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

        $this->actingAs(Auth::loginUsingId(1));
        $this->call('DELETE', '/admin/question/' . $question->id);
        $this->notSeeInDatabase('questions', ['id' => $question->id]);
        $this->notSeeInDatabase('answers', ['id' => $answer->first()->id]);
        $this->notSeeInDatabase('answers', ['id' => $answer->last()->id]);
    }
}
