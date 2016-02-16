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

    use DatabaseTransactions;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();
    }

    public function testDeleteUser()
    {
        session()->put('userType','User');

        $email= uniqid().'@abc.com';
        $question = uniqid().'this is question';
        $subjectID = 1;
        $levelID = 1;
        $np_code = uniqid();
        //create a user
        $user= factory('App\Src\User\User',
            1)->create(['email'=>$email,'np_code'=>$np_code]);

        //assign role as student
        $student = factory('App\Src\Student\Student',1)->create(['user_id'=>$user->id]);

        // create a question
        $question= factory('App\Src\Question\Question',1)->create(['user_id'=>$user->id,'subject_id'=>$subjectID,'body_en'=>$question]);

        // assign a level
        $level = factory(UserLevel::class)->create([
            'user_id'    => $user->id,
            'level_id' => $levelID
        ]);

        // perform deletion
        $this->actingAs($user)->call('delete','/profile/'.$user->id);

        $this->notSeeInDatabase('user_levels',
            ['user_id' => $user->id]);

        $this->notSeeInDatabase('questions',
            ['user_id' => $user->id]);

        $this->notSeeInDatabase('students',
            ['user_id' => $user->id]);

        $this->notSeeInDatabase('users',
            ['id' => $user->id]);

        // check database
        return true;
    }

}
