<?php

use App\Src\Educator\Educator;
use App\Src\Level\UserLevel;
use App\Src\Student\Student;
use App\Src\Subject\Subject;
use App\Src\Subject\UserSubject;
use App\Src\User\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class AdminUserControllerTest extends TestCase
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

        $admin = Auth::loginUsingId(1);

        factory(User::class)->make()->create(['firstname_en' => uniqid(), 'email' => uniqid()]);
        $educator = factory(Educator::class)->create(['user_id' => $user->all()->last()->id]);

        factory(User::class)->make()->create(['firstname_en' => uniqid(), 'email' => uniqid()]);
        $educator1 = factory(Educator::class)->create(['user_id' => $user->all()->last()->id]);

        factory(User::class)->make()->create(['firstname_en' => uniqid(), 'email' => uniqid()]);
        $student1 = factory(Student::class)->create(['user_id' => $user->all()->last()->id]);

        factory(User::class)->make()->create(['firstname_en' => uniqid(), 'email' => uniqid()]);
        $student2 = factory(Student::class)->create(['user_id' => $user->all()->last()->id]);

        $this->actingAs($admin)
            ->visit('/admin/user')
            ->see($educator->profile->firstname)
            ->see($educator1->profile->firstname)
            ->see($student1->profile->firstname)
            ->see($student2->profile->firstname);

    }

    public function testDeleteEducator()
    {
        $user = factory(User::class)->create(['firstname_en' => uniqid(), 'email' => uniqid()]);

        $educator = factory(Educator::class)->create(['user_id' => $user->id]);

        $subjects = factory(Subject::class, 6)->create(['name_en' => uniqid()]);

        $subjectsArray = $subjects->take(6)->sortByDesc('created_at')->modelKeys();

        $sub1 = factory(UserSubject::class)->create([
            'user_id'    => $educator->profile->id,
            'subject_id' => array_pop($subjectsArray),
            'active'     => 1
        ]);
        $sub2 = factory(UserSubject::class)->create([
            'user_id'    => $educator->profile->id,
            'subject_id' => array_pop($subjectsArray),
            'active'     => 1
        ]);
        $sub3 = factory(UserSubject::class)->create([
            'user_id'    => $educator->profile->id,
            'subject_id' => array_pop($subjectsArray),
            'active'     => 1
        ]);
        $sub4 = factory(UserSubject::class)->create([
            'user_id'    => $educator->profile->id,
            'subject_id' => array_pop($subjectsArray),
            'active'     => 0
        ]);

        $question = factory('App\Src\Question\Question')->create([
            'body_en'    => uniqid(),
            'user_id'    => '3',
            'subject_id' => $sub3->subject_id,
            'level_id'   => '2'
        ]);

        $answer = factory('App\Src\Answer\Answer')->create([
            'question_id' => $question->id,
            'user_id'     => $educator->profile->id,
            'body_en'     => uniqid(),
            'parent_id'   => 0
        ]);

        $answers = factory('App\Src\Answer\Answer', 5)->create([
            'question_id' => $question->id,
            'user_id'     => $educator->profile->id,
            'body_en'     => uniqid(),
            'parent_id'   => $answer->id
        ]);

        $admin = Auth::loginUsingId(1);
        $this->actingAs($admin)->call('delete','/admin/user/'.$educator->profile->id);

        // deactivate subjects that are not in get request
        $this->notSeeInDatabase('user_subjects',
            ['user_id' => $educator->profile->id, 'subject_id' => $sub3->subject_id]);

        $this->notSeeInDatabase('user_subjects',
            ['user_id' => $educator->profile->id, 'subject_id' => $sub4->subject_id]);

        // check the educators question related to the de-activated subjects are also deleted
        $this->notSeeInDatabase('answers',
            ['user_id' => $educator->profile->id, 'question_id' => $question->id]);

    }
}
