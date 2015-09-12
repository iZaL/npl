<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class QuestionControllerTest extends TestCase
{

    use DatabaseTransactions;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();
    }

    public function testStore()
    {
        $body = uniqid();
        $subjectID = 2;

        $user = Auth::loginUsingId(3); // student

        $this->actingAs($user)
            ->visit('/question/create')
            ->select($subjectID, 'subject_id')
            ->type($body, 'body_en')
            ->press('Submit');

        $level = $user->levels->last();

        $this->seeInDatabase('questions',
            [
                'body_en'    => $body,
                'user_id'    => $user->id,
                'subject_id' => 2,
                'level_id'   => $level->id
            ]);

        $this->onPage('student/questions');

    }

}
