<?php

use App\Src\User\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AnswerControllerTest extends TestCase
{

    use DatabaseTransactions;
//    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();
    }

    public function testAnswerSuccessAsEducator()
    {
        session()->put('userType','Educator');

        $educator = $this->createEducator([],[1],[2]); // Educator
        $student = $this->createStudent([],[1],[2]); // student

        $questionBody = 'How much is 1+1 ? ';
        $answerBody = uniqid();
        $question = factory('App\Src\Question\Question',
            1)->create(['user_id' => $student->id, 'subject_id' => 1, 'body_en' => $questionBody, 'level_id' => 2]);

        $this->actingAs($educator)
            ->visit('/question/' . $question->id . '/answer')
            ->type($question->id, 'question_id')
            ->type($answerBody, 'body_en')
            ->press('Submit');


        $this->seeInDatabase('answers',
            [
                'body_en'     => $answerBody,
                'user_id'     => $educator->id,
                'question_id' => $question->id,
                'parent_id'   => 0,
            ]);

        $answer = \App\Src\Answer\Answer::where('body_en',$answerBody)->where('question_id',$question->id)->first();

        $this->seeInDatabase('notifications',
            [
                'user_id'     => $question->user_id,
                'notifiable_id' => $answer->id,
                'notifiable_type' => 'MorphAnswer'
            ]);

        $answer = App\Src\Answer\Answer::where('body_en',$answerBody)->first();
        $this->seePageIs('question/' . $question->id . '/reply/'.$answer->id);

    }

    public function testAnswerFailsAsEducatorLevelDoesntMatch()
    {
        session()->put('userType','Educator');

        $educator = $this->createEducator([],[1],[2]); // Educator
        $student = $this->createStudent([],[1],[2]); // student

        $questionBody = 'How much is 1+1 ? ';
        $question = factory('App\Src\Question\Question',
            1)->create(['user_id' => $student->id, 'subject_id' => 1, 'body_en' => $questionBody, 'level_id' => 78]);

        $this->actingAs($educator)->visit('/question/' . $question->id . '/answer')
            ->see('You cannot answer this question. Level not in ur list');
    }

    public function testAnswerFailsAsEducatorSubjectDoesntMatch()
    {
        session()->put('userType','Educator');

        $educator = $this->createEducator([],[1],[2]); // Educator
        $student = $this->createStudent([],[1],[2]); // student

        $questionBody = 'How much is 1+1 ? ';
        $answerBody = 'answer is 2 ';
        $question = factory('App\Src\Question\Question',
            1)->create(['user_id' => $student->id, 'subject_id' => 300, 'body_en' => $questionBody, 'level_id' => 2]);

        $this->actingAs($educator)->visit('/question/' . $question->id . '/answer')
            ->see('You cannot answer this question. Subject either not in ur list or not approved by admin');
    }

    public function testAnswerFailsAsInvalidEducator()
    {
        session()->put('userType','Educator');

        $educator = $this->createStudent([],[1],[2]); // Educator
        $student = $this->createStudent([],[1],[2]); // student

        $questionBody = 'How much is 1+1 ? ';
        $question = factory('App\Src\Question\Question',
            1)->create(['user_id' => $student->id, 'subject_id' => 1, 'body_en' => $questionBody, 'level_id' => 2]);

        $this->actingAs($educator)->visit('/question/' . $question->id . '/answer')
            ->see('You cannot answer this question. Not an educator');
    }

    /*********************************************************************************************************
     * Replies
     ********************************************************************************************************/

    public function testReplySuccessAsEducator()
    {
        session()->put('userType','Educator');

        $educator = $this->createEducator([],[1],[2]); // Educator
        $student = $this->createStudent([],[1],[2]); // student

        $questionBody = 'What is Physics ? ';
        $answerBody = 'Physics is  BS';
        $question = factory('App\Src\Question\Question',
            1)->create(['user_id' => $student->id, 'subject_id' => 1, 'body_en' => $questionBody, 'level_id' => 2]);

        $parentAnswer = factory('App\Src\Answer\Answer',1)->create([
            'user_id'     => $educator->id,
            'question_id' => $question->id,
            'body_en'     => $answerBody,
            'parent_id'   => 0
        ]);

        $reply1 = 'But Sometimes Physics is useful'.uniqid();
        $this->actingAs($educator)
            ->visit('/question/' . $question->id . '/reply/' . $parentAnswer->id)
            ->type($question->id, 'question_id')
            ->type($parentAnswer->id, 'answer_id')
            ->type($reply1, 'body_en')
            ->press('Reply');

        $this->seeInDatabase('answers',
            [
                'body_en'     => $reply1,
                'user_id'     => $educator->id,
                'question_id' => $question->id,
                'parent_id'   => $parentAnswer->id,
            ]);

        $currentAnswer= \App\Src\Answer\Answer::where('body_en',$reply1)->first();

        $this->seePageIs('question/' . $question->id . '/reply/' . $currentAnswer->id);
    }

    public function testReplySuccessAsStudent()
    {
        session()->put('userType','Student');

        $educator = $this->createStudent([],[1],[2]); // Educator
        $student = $this->createStudent([],[1],[2]); // student

        $questionBody = 'What is Physics ? ';
        $answerBody = 'Physics is  BS';
        $question = factory('App\Src\Question\Question',
            1)->create(['user_id' => $student->id, 'subject_id' => 1, 'body_en' => $questionBody, 'level_id' => 2]);

        $parentAnswer = factory('App\Src\Answer\Answer',
            1)->create([
            'user_id'     => $educator->id,
            'question_id' => $question->id,
            'body_en'     => $answerBody,
            'parent_id'   => 0
        ]);

        $reply1 = 'are u out of ur mind sir ? '.uniqid();
        $this->actingAs($student)
            ->visit('/question/' . $question->id . '/reply/' . $parentAnswer->id)
            ->type($question->id, 'question_id')
            ->type($parentAnswer->id, 'answer_id')
            ->type($reply1, 'body_en')
            ->press('Reply');
        $this->seeInDatabase('answers',
            [
                'body_en'     => $reply1,
                'user_id'     => $student->id,
                'question_id' => $question->id,
                'parent_id'   => $parentAnswer->id,
            ]);

        $currentAnswer= \App\Src\Answer\Answer::where('body_en',$reply1)->first();

        $this->seePageIs('question/' . $question->id . '/reply/' . $currentAnswer->id);

    }

    public function testReplyFailsAsInvalidEducator()
    {
        session()->put('userType','Educator');

        $educator = $this->createEducator([],[1],[3]);
        $student = $this->createStudent([]);

        $questionBody = 'What is Physics ? ';
        $answerBody = 'Physics is  BS';
        $question = factory('App\Src\Question\Question',
            1)->create(['user_id' => $student->id, 'subject_id' => 1, 'body_en' => $questionBody, 'level_id' => 1]);

        $parentAnswer = factory('App\Src\Answer\Answer',
            1)->create([
            'user_id'     => $educator->id,
            'question_id' => $question->id,
            'body_en'     => $answerBody,
            'parent_id'   => 0
        ]);

        $this->actingAs($educator)
            ->visit('/question/' . $question->id . '/reply/' . $parentAnswer->id)
            ->see('You cannot answer this question. Level not in ur list');

    }

    public function testRejectAnswersIftheMaxCountReached()
    {
        session()->put('userType','Educator');

        $educator = $this->createEducator([],[1],[1]); // Educator

        $questionBody = uniqid();
        $answerBody = uniqid();
        $question = factory('App\Src\Question\Question',
            1)->create(['user_id' => rand(1,10), 'subject_id' => 1, 'body_en' => $questionBody, 'level_id' => 1]);

        $parentAnswer = factory('App\Src\Answer\Answer',
            5)->create([
            'user_id'     => $educator->id,
            'question_id' => $question->id,
            'body_en'     => $answerBody,
            'parent_id'   => 0
        ]);

        $this->actingAs($educator)->visit('/question/' . $question->id . '/answer')->see('This Question has reached maximum answers count');

    }


    public function testReplyFailsAsInvalidStudent()
    {
        session()->put('userType','Student');

        $educator = $this->createEducator([],[1],[2]); // Educator
        $student = $this->createEducator([],[1],[2]); // student

        $questionBody = 'What is Physics ? ';
        $answerBody = 'Physics is  BS';
        $question = factory('App\Src\Question\Question',
            1)->create(['user_id' => '1', 'subject_id' => 1, 'body_en' => $questionBody, 'level_id' => 3]);

        $parentAnswer = factory('App\Src\Answer\Answer',
            1)->create([
            'user_id'     => $educator->id,
            'question_id' => $question->id,
            'body_en'     => $answerBody,
            'parent_id'   => 0
        ]);

        $this->actingAs($student)
            ->visit('/question/' . $question->id . '/reply/' . $parentAnswer->id)
            ->see('You Cannot Reply This Question');

    }


}