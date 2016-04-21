<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class QuestionControllerTest extends TestCase
{

    use DatabaseTransactions;
//    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();
    }

    public function testStoreNotifiesEducators()
    {
        session()->put('userType','Student');

        $body = uniqid();
        $subjectID = 1;

        $educator1 = $this->createEducator([],[1,2,3],[1,2,3]);
        $educator2 = $this->createEducator([],[1],[2]);
        $educator3 = $this->createEducator([],[1],[1]);

        $student = $this->createStudent([],[1],[1]); // student

        $this->actingAs($student)
            ->call('post','question',['subject_id'=>$subjectID,'body_en'=>$body]);

        $question = \App\Src\Question\Question::where('body_en',$body)->first();

        $this->seeInDatabase('notifications',[
            'user_id' => $educator1->id,
            'notifiable_id'=>$question->id,
            'notifiable_type' => 'MorphQuestion'
        ]);

        $this->seeInDatabase('notifications',[
            'user_id' => $educator3->id,
            'notifiable_id'=>$question->id,
            'notifiable_type' => 'MorphQuestion'
        ]);

        $this->dontSeeInDatabase('notifications',[
            'user_id' => $educator2->id,
            'notifiable_id'=>$question->id,
            'notifiable_type' => 'MorphQuestion'
        ]);


    }

    public function testStore()
    {
        session()->put('userType','Student');

        $body = uniqid();
        $subjectID = 1;
        $student = $this->createStudent([],[1],[1]); // student
        $level = $student->levels->last();

        $this->actingAs($student)
            ->call('post','question',['subject_id'=>$subjectID,'body_en'=>$body]);
        $this->seeInDatabase('questions',
            [
                'body_en'    => $body,
                'user_id'    => $student->id,
                'subject_id' => $subjectID,
                'level_id'   => $level->id
            ]);

    }

}
