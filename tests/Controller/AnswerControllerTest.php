<?php

use App\Src\User\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AnswerControllerTest extends TestCase
{

    use DatabaseTransactions;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();
    }


    public function testAnswerSuccessAsEducator()
    {
        $educator = User::find(2); // Educator
        $student = User::find(3); // student

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

        $answer = App\Src\Answer\Answer::where('body_en',$answerBody)->first();
        $this->onPage('question/' . $question->id . '/reply/'.$answer->id);

    }

    public function testAnswerFailsAsEducatorLevelDoesntMatch()
    {
        $educator = User::find(2); // Educator
        $student = User::find(3); // student

        $questionBody = 'How much is 1+1 ? ';
        $question = factory('App\Src\Question\Question',
            1)->create(['user_id' => $student->id, 'subject_id' => 1, 'body_en' => $questionBody, 'level_id' => 3]);

        $this->actingAs($educator)->visit('/question/' . $question->id . '/answer')
            ->see('Your cannot answer this question. Level not in ur list');
    }

    public function testAnswerFailsAsEducatorSubjectDoesntMatch()
    {
        $educator = User::find(2); // Educator
        $student = User::find(3); // student

        $questionBody = 'How much is 1+1 ? ';
        $answerBody = 'answer is 2 ';
        $question = factory('App\Src\Question\Question',
            1)->create(['user_id' => $student->id, 'subject_id' => 3, 'body_en' => $questionBody, 'level_id' => 2]);

        $this->actingAs($educator)->visit('/question/' . $question->id . '/answer')
            ->see('Your cannot answer this question. Subject not in ur list');
    }

    public function testAnswerFailsAsInvalidEducator()
    {
        $educator = User::find(5); // Student
        $student = User::find(3); // student

        $questionBody = 'How much is 1+1 ? ';
        $question = factory('App\Src\Question\Question',
            1)->create(['user_id' => $student->id, 'subject_id' => 1, 'body_en' => $questionBody, 'level_id' => 2]);

        $this->actingAs($educator)->visit('/question/' . $question->id . '/answer')
            ->see('Your cannot answer this question. Not an educator');
    }

    /*********************************************************************************************************
     * Replies
     ********************************************************************************************************/

    public function testReplySuccessAsEducator()
    {
        $educator = User::find(2); // Educator
        $student = User::find(3); // student

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

        $reply1 = 'But Sometimes Physics is useful';
        $this->actingAs($educator)
            ->visit('/question/' . $question->id . '/reply/' . $parentAnswer->id)
            ->type($question->id, 'question_id')
            ->type($parentAnswer->id, 'answer_id')
            ->type($reply1, 'body_en')
            ->press('Submit');;
        $this->seeInDatabase('answers',
            [
                'body_en'     => $reply1,
                'user_id'     => $educator->id,
                'question_id' => $question->id,
                'parent_id'   => $parentAnswer->id,
            ]);

        $this->onPage('question/' . $question->id . '/reply/' . $parentAnswer->id);

    }

    public function testReplySuccessAsStudent()
    {
        $educator = User::find(2); // Educator
        $student = User::find(3); // student

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

        $reply1 = 'are u out of ur mind sir ? ';
        $this->actingAs($student)
            ->visit('/question/' . $question->id . '/reply/' . $parentAnswer->id)
            ->type($question->id, 'question_id')
            ->type($parentAnswer->id, 'answer_id')
            ->type($reply1, 'body_en')
            ->press('Submit');
        $this->seeInDatabase('answers',
            [
                'body_en'     => $reply1,
                'user_id'     => $student->id,
                'question_id' => $question->id,
                'parent_id'   => $parentAnswer->id,
            ]);

        $this->onPage('question/' . $question->id . '/reply/' . $parentAnswer->id);

    }

    public function testReplyFailsAsInvalidEducator()
    {
        $educator = User::find(2); // Educator
        $student = User::find(3); // student

        $questionBody = 'What is Physics ? ';
        $answerBody = 'Physics is  BS';
        $question = factory('App\Src\Question\Question',
            1)->create(['user_id' => $student->id, 'subject_id' => 1, 'body_en' => $questionBody, 'level_id' => 3]);

        $parentAnswer = factory('App\Src\Answer\Answer',
            1)->create([
            'user_id'     => $educator->id,
            'question_id' => $question->id,
            'body_en'     => $answerBody,
            'parent_id'   => 0
        ]);

        $this->actingAs($educator)
            ->visit('/question/' . $question->id . '/reply/' . $parentAnswer->id)
            ->see('Your cannot answer this question. Level not in ur list');

    }

    public function testReplyFailsAsInvalidStudent()
    {
        $educator = User::find(2); // Educator
        $student = User::find(3); // student

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