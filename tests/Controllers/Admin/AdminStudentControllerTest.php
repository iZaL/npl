<?php

use App\Src\Educator\Educator;
use App\Src\Level\UserLevel;
use App\Src\Student\Student;
use App\Src\User\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class AdminStudentControllerTest extends TestCase
{

    use DatabaseTransactions;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();
    }

    public function testIndex()
    {
        $user = App::make(User::class);

        factory(User::class)->make()->create(['firstname_en' => uniqid(), 'email' => uniqid()]);
        $educator = factory(Educator::class)->create(['user_id' => $user->all()->last()->id]);

        factory(User::class)->make()->create(['firstname_en' => uniqid(), 'email' => uniqid()]);
        $student1 = factory(Student::class)->create(['user_id' => $user->all()->last()->id]);

        factory(User::class)->make()->create(['firstname_en' => uniqid(), 'email' => uniqid()]);
        $student2 = factory(Student::class)->create(['user_id' => $user->all()->last()->id]);

        $this->actingAs(Auth::loginUsingId(1))
            ->visit('/admin/student')
            ->dontSee($educator->profile->firstname)
            ->see($student1->profile->firstname)
            ->see($student2->profile->firstname);

    }

    public function testDelete()
    {

        $user = App::make(User::class);

        factory(User::class)->make()->create(['firstname_en' => uniqid(), 'email' => uniqid()]);
        $educator = factory(Educator::class)->create(['user_id' => $user->all()->last()->id]);

        factory(User::class)->make()->create(['firstname_en' => uniqid(), 'email' => uniqid()]);
        $student = factory(Student::class)->create(['user_id' => $user->all()->last()->id]);

        factory(UserLevel::class)->create(['user_id' => $student->profile->id, 'level_id' => 2]);

        $questionBody = uniqid();
        $answerBody = uniqid();
        $subjectID = 2;
        $levelID = 2;

        $question = factory('App\Src\Question\Question')->create([
            'body_en'    => $questionBody,
            'user_id'    => $student->profile->id,
            'subject_id' => $subjectID,
            'level_id'   => $levelID
        ]);

        $answer = factory('App\Src\Answer\Answer')->create([
            'question_id' => $question->id,
            'user_id'     => $educator->profile->id,
            'body_en'     => $answerBody,
            'parent_id'   => 0
        ]);

        $answers = factory('App\Src\Answer\Answer', 5)->create([
            'question_id' => $question->id,
            'user_id'     => $educator->profile->id,
            'body_en'     => $answerBody,
            'parent_id'   => $answer->id
        ]);

        $this->actingAs(Auth::loginUsingId(1));
        $this->call('DELETE', '/admin/student/' . $student->id);
        $this->notSeeInDatabase('questions', ['id' => $question->id]);
        $this->notSeeInDatabase('answers', ['id' => $answers->first()->id]);
        $this->notSeeInDatabase('answers', ['id' => $answers->last()->id]);
        $this->notSeeInDatabase('user_levels', ['user_id' => $student->profile->id]);
        $this->notSeeInDatabase('user_subjects', ['user_id' => $student->profile->id]);
    }
}
