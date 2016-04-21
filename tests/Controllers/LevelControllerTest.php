<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class LevelControllerTest extends TestCase
{

    use DatabaseTransactions;
//    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();
    }

    public function testEducatorCanAnswerQuestions()
    {
        session()->put('userType','Educator');

        $body1 = uniqid();
        $body2 = uniqid();
        $level1 = factory(\App\Src\Level\Level::class,1)->create();
        $level2 = factory(\App\Src\Level\Level::class,1)->create();

        $educator = $this->createEducator([],[1],[$level1->id]); // educator
        $student = $this->createStudent([],[1],[$level1->id]); // student

        $q1 = factory('App\Src\Question\Question',
            1)->create(['user_id' => $student->id, 'subject_id' => 1, 'body_en' => $body1, 'level_id' => $level1->id]);

        $q2 = factory('App\Src\Question\Question',
            1)->create(['user_id' => $student->id, 'subject_id' => 1, 'body_en' => $body2, 'level_id' => $level2->id]);

        $this->actingAs($educator)
            ->visit('/level/'.$level1->id)
            ->see(ucfirst($q1->body))
            ->dontSeeLink(ucfirst($q2->body))
            ->seeLink($q1->body)
        ;

    }

}
