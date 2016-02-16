<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class StudentControllerTest extends TestCase
{

    use DatabaseTransactions;
//    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();
    }

    public function testStudentCanSeeHisAskedQuestions()
    {
        session()->put('userType','Student');

        $student = Auth::loginUsingId(3);

        $questionBody1 = uniqid();
        $questionBody2 = uniqid();
        $questionBody3 = uniqid();

        factory('App\Src\Question\Question',
            1)->create(['user_id' => $student->id, 'subject_id' => 1, 'body_en' => $questionBody1, 'level_id' => 2]);
        factory('App\Src\Question\Question',
            1)->create(['user_id' => $student->id, 'subject_id' => 1, 'body_en' => $questionBody2, 'level_id' => 2]);
        factory('App\Src\Question\Question',
            1)->create(['user_id' => 100, 'subject_id' => 1, 'body_en' => $questionBody3, 'level_id' => 100]);

        $this->actingAs($student)
            ->visit('/student/questions')
            ->see($questionBody1)
            ->see($questionBody2)
            ->dontSee($questionBody3)
        ;
    }
}
