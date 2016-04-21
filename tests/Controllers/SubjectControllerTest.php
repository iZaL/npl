<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class SubjectControllerTest extends TestCase
{

    use DatabaseTransactions;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();
    }

    public function testEducatorCanAnswerQuestions()
    {
        session()->put('userType','Educator');

        $body1 = uniqid();
        $body2 = uniqid();
        $subjectID = 1; // physics

        $educator = $this->createEducator([],[1],[1]); // student
        $student = $this->createStudent([],[1],[1]); // student

        $q1 = factory('App\Src\Question\Question',
            1)->create(['user_id' => $student->id, 'subject_id' => $subjectID, 'body_en' => $body1, 'level_id' => 1]);

        // level 1 not in user's level
        $q2 = factory('App\Src\Question\Question',
            1)->create(['user_id' => $student->id, 'subject_id' => $subjectID, 'body_en' => $body2, 'level_id' => 2]);

        session()->put('userType','Educator');

        $this->actingAs($educator)
            ->visit('/subject/'.$subjectID)
            ->see(ucfirst($q1->body))
            ->see(ucfirst($q2->body))
            ->seeLink($q1->body)
            ->dontSeeLink($q2->body)
        ;

    }

}
