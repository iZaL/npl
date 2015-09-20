<?php

use App\Src\Educator\Educator;
use App\Src\Student\Student;
use App\Src\User\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class AdminLevelControllerTest extends TestCase
{

    use DatabaseTransactions;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();
    }

    public function testIndex()
    {
        $subjectName1 = uniqid();
        $subjectName2 = uniqid();
        factory('App\Src\Level\Level')->create(['name_en' => $subjectName1]);
        factory('App\Src\Level\Level')->create(['name_en' => $subjectName2]);
        $this->actingAs(Auth::loginUsingId(1))
            ->visit('/admin/level')
            ->see($subjectName1)
            ->see($subjectName2);

    }

    public function testStore()
    {
        $subjectName1 = uniqid();

        $this->actingAs(Auth::loginUsingId(1))
            ->visit('admin/level/create')
            ->type($subjectName1, 'name_en')
            ->press('Save')
            ->seeInDatabase('levels', ['name_en' => $subjectName1]);

    }

    public function testDelete()
    {
        $subjectName1 = uniqid();
        $questionBody = uniqid();
        $answerBody = uniqid();

        $level = factory('App\Src\Level\Level')->create(['name_en' => $subjectName1]);

//        $user = App::make(User::class);

//        factory(User::class)->make()->create(['email' => uniqid()]);
//        $educator = factory(Educator::class)->create(['user_id' => $user->all()->last()->id]);
//
//        factory(User::class)->make()->create(['email' => uniqid()]);
//        $student = factory(Student::class)->create(['user_id' => $user->all()->last()->id]);

        $question = factory('App\Src\Question\Question')->create([
            'body_en'    => $questionBody,
            'user_id'    => uniqid(),
            'subject_id' => $level->id,
            'level_id'   => $level->id,
        ]);

        $answer = factory('App\Src\Answer\Answer')->create([
            'question_id' => $question->id,
            'user_id'     => rand(100, 200),
            'body_en'     => $answerBody,
            'parent_id'   => 0
        ]);

        $answers = factory('App\Src\Answer\Answer', 5)->create([
            'question_id' => $question->id,
            'user_id'     => rand(100, 200),
            'body_en'     => $answerBody,
            'parent_id'   => $answer->id
        ]);


        $this->actingAs(Auth::loginUsingId(1));
        $this->call('DELETE', '/admin/level/' . $level->id);

        $this->notSeeInDatabase('questions', ['id' => $question->id]);
        $this->notSeeInDatabase('answers', ['id' => $answers->first()->id]);
        $this->notSeeInDatabase('answers', ['id' => $answers->last()->id]);
        $this->notSeeInDatabase('levels', ['id' => $level->id]);
    }

}
