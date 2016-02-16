<?php

use App\Events\UserRegistered;
use App\Src\Level\UserLevel;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class ProfileControllerTest extends TestCase
{

//    use DatabaseTransactions;
//    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();
    }

    public function testDeleteStudent()
    {
        session()->put('userType','Student');

        $question = uniqid().'this is question';
        $subjectID = 1;
        $levelID = 1;
        //create a user
        $user= $this->createStudent();

        $user->levels()->sync([$levelID]);

        // create a question
        factory('App\Src\Question\Question',1)->create(['user_id'=>$user->id,'subject_id'=>$subjectID,'body_en'=>$question]);

        // perform deletion
        $this->actingAs($user)->call('DELETE','/profile/'.$user->id);

        $this->notSeeInDatabase('user_levels',
            ['user_id' => $user->id]);

        $this->notSeeInDatabase('questions',
            ['user_id' => $user->id]);

        $this->notSeeInDatabase('students',
            ['user_id' => $user->id]);

        $this->notSeeInDatabase('users',
            ['id' => $user->id]);

        // check database
    }

    public function testDeleteEducator()
    {
        session()->put('userType','Educator');

        $answer1 = uniqid();
        $answer2 = uniqid();
        $subjectID = 1;
        $levelID = 1;
        //create a user
        $user= $this->createEducator();
        $user->levels()->sync([$levelID]);
        $user->subjects()->sync([$subjectID]);

        // create a question
        $parentAnswer = factory('App\Src\Answer\Answer',1)->create([
            'user_id'=>$user->id,
            'question_id'=>1,
            'body_en'=>$answer1,
            'parent_id'=>0
        ]);
        $answers = factory('App\Src\Answer\Answer',3)->create([
            'user_id'=>$user->id,
            'question_id'=>1,
            'body_en'=>$answer2,
            'parent_id'=>$parentAnswer->id
        ]);

        // perform deletion
        $this->actingAs($user)->call('DELETE','/profile/'.$user->id);

        $this->notSeeInDatabase('user_levels',
            ['user_id' => $user->id]);

        $this->notSeeInDatabase('user_subjects',
            ['user_id' => $user->id]);

        $this->notSeeInDatabase('answers',
            ['user_id' => $user->id]);

        $this->notSeeInDatabase('educators',
            ['user_id' => $user->id]);

        $this->notSeeInDatabase('users',
            ['id' => $user->id]);

        // check database
    }

}
