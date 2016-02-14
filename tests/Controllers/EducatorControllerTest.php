<?php

use App\Src\User\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class EducatorControllerTest extends TestCase
{

    use DatabaseTransactions;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();
    }

    public function testEducatorPageHasProfileLinks()
    {
        $educator = Auth::loginUsingId(2);
        $this->actingAs($educator)
            ->visit('/educator')
            ->see('My Profile');
    }

    public function testEducatorPageDoesnotHaveProfileLinks()
    {
        $educator = Auth::loginUsingId(3);

        $this->actingAs($educator)
            ->visit('/educator')
            ->dontSee('My Profile');
    }

    public function testEducatorCanSeeQuestionsThatHeCanAnswer()
    {
        $educator = Auth::loginUsingId(2);

        $student = Auth::loginUsingId(3);

        $questionBody1 = uniqid();
        $questionBody2 = uniqid();
        $questionBody3 = uniqid();

        factory('App\Src\Question\Question',
            1)->create(['user_id' => $student->id, 'subject_id' => 1, 'body_en' => $questionBody1, 'level_id' => 2]);
        factory('App\Src\Question\Question',
            1)->create(['user_id' => $student->id, 'subject_id' => 1, 'body_en' => $questionBody2, 'level_id' => 2]);
        factory('App\Src\Question\Question',
            1)->create(['user_id' => $student->id, 'subject_id' => 1, 'body_en' => $questionBody3, 'level_id' => 100]);

        $this->actingAs($educator)
            ->visit('/educator/questions')
            ->see($questionBody1)
            ->see($questionBody2)
            ->dontSee($questionBody3)
        ;
    }

    public function testEducatorCanBrowseHisAnswers()
    {
        $educator = Auth::loginUsingId(2);

        $student = Auth::loginUsingId(3);

        $questionBody1 = uniqid();

        $answerBody1 = uniqid();

        $question1 = factory('App\Src\Question\Question',
            1)->create(['user_id' => $student->id, 'subject_id' => 1, 'body_en' => $questionBody1, 'level_id' => 2]);
        factory('App\Src\Answer\Answer',
            1)->create(['user_id' => $educator->id, 'question_id' => $question1->id, 'body_en' => $answerBody1, 'parent_id' => 0]);

        $this->actingAs($educator)
            ->visit('/educator/answers')
            ->see($questionBody1)
            ->see($answerBody1)
        ;
    }


}