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

class AdminEducatorControllerTest extends TestCase
{

    use DatabaseTransactions;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();
    }


    /**
     *
     */
//    public function testActivatesSubjects()
//    {
//        $user = factory(User::class)->create(['firstname_en' => uniqid(), 'email' => uniqid()]);
//
//        $educator = factory(Educator::class)->create(['user_id' => $user->id]);
//
//        $subjects = factory(Subject::class, 6)->create(['name_en' => uniqid()]);
//
//        $subjectsArray = $subjects->take(6)->sortByDesc('created_at')->modelKeys();
//
//        $sub1 = factory(UserSubject::class)->create([
//            'user_id'    => $educator->profile->id,
//            'subject_id' => array_pop($subjectsArray),
//            'active'     => 1
//        ]);
//        $sub2 = factory(UserSubject::class)->create([
//            'user_id'    => $educator->profile->id,
//            'subject_id' => array_pop($subjectsArray),
//            'active'     => 1
//        ]);
//        $sub3 = factory(UserSubject::class)->create([
//            'user_id'    => $educator->profile->id,
//            'subject_id' => array_pop($subjectsArray),
//            'active'     => 1
//        ]);
//        $sub4 = factory(UserSubject::class)->create([
//            'user_id'    => $educator->profile->id,
//            'subject_id' => array_pop($subjectsArray),
//            'active'     => 0
//        ]);
//        $sub5 = factory(UserSubject::class)->create([
//            'user_id'    => $educator->profile->id,
//            'subject_id' => array_pop($subjectsArray),
//            'active'     => 0
//        ]);
//        $sub6 = factory(UserSubject::class)->create([
//            'user_id'    => $educator->profile->id,
//            'subject_id' => array_pop($subjectsArray),
//            'active'     => 0
//        ]);
//
//        $activeSubjects = $educator->profile->activeSubjects->modelKeys();
//        $inActiveSubjects = $educator->profile->inActiveSubjects->modelKeys();
//
//        $this->assertContains($sub1->subject_id, $activeSubjects);
//        $this->assertContains($sub2->subject_id, $activeSubjects);
//        $this->assertContains($sub3->subject_id, $activeSubjects);
//
//        $this->assertContains($sub4->subject_id, $inActiveSubjects);
//        $this->assertContains($sub5->subject_id, $inActiveSubjects);
//        $this->assertContains($sub6->subject_id, $inActiveSubjects);
//
//        $this->actingAs(Auth::loginUsingId(1));
//        $this->call('POST', '/admin/educator/' . $educator->id . '/activate-subjects',
//            ['user_id' => $educator->profile->id, 'subjects' => [$sub5->subject_id, $sub6->subject_id]]);
//
//        // check the left out subject is removed from database
//        $this->notSeeInDatabase('user_subjects',
//            ['user_id' => $educator->profile->id, 'subject_id' => $sub4->subject_id, 'active' => 1]);
//        $this->notSeeInDatabase('user_subjects',
//            ['user_id' => $educator->profile->id, 'subject_id' => $sub4->subject_id]);
//
//        // check no duplicate records
//        $this->notSeeInDatabase('user_subjects',
//            ['user_id' => $educator->profile->id, 'subject_id' => $sub5->subject_id, 'active' => 0]);
//
//        // check new record exists i.e the subject has been activated
//        $this->seeInDatabase('user_subjects',
//            ['user_id' => $educator->profile->id, 'subject_id' => $sub5->subject_id, 'active' => 1]);
//
//        $this->seeInDatabase('user_subjects',
//            ['user_id' => $educator->profile->id, 'subject_id' => $sub6->subject_id, 'active' => 1]);
//
//        // check old record remains
//        $this->seeInDatabase('user_subjects',
//            ['user_id' => $educator->profile->id, 'subject_id' => $sub1->subject_id, 'active' => 1]);
//
//    }

    public function testDeActivatesSubjects()
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
        $sub5 = factory(UserSubject::class)->create([
            'user_id'    => $educator->profile->id,
            'subject_id' => array_pop($subjectsArray),
            'active'     => 0
        ]);
        $sub6 = factory(UserSubject::class)->create([
            'user_id'    => $educator->profile->id,
            'subject_id' => array_pop($subjectsArray),
            'active'     => 0
        ]);

        $activeSubjects = $educator->profile->activeSubjects->modelKeys();
        $inActiveSubjects = $educator->profile->inActiveSubjects->modelKeys();

        $this->actingAs(Auth::loginUsingId(1));
        $this->call('POST', '/admin/educator/' . $educator->id . '/de-activate-subjects',
            ['user_id' => $educator->profile->id, 'subjects' => [$sub1->subject_id, $sub2->subject_id]]);

        // check old records are not altered or deleted
        $this->seeInDatabase('user_subjects',
            ['user_id' => $educator->profile->id, 'subject_id' => $sub4->subject_id, 'active' => 0]);

//        $this->notSeeInDatabase('user_subjects',
//            ['user_id' => $educator->profile->id, 'subject_id' => $sub1->subject_id]);

//        $this->notSeeInDatabase('user_subjects',
//            ['user_id' => $educator->profile->id, 'subject_id' => $sub2->subject_id]);

//        $this->seeInDatabase('user_subjects',
//            ['user_id' => $educator->profile->id, 'subject_id' => $sub6->subject_id, 'active' => 1]);

    }


//    public function testIndex()
//    {
//        $user = App::make(User::class);
//
//        factory(User::class)->make()->create(['firstname_en' => uniqid(), 'email' => uniqid()]);
//        $educator1 = factory(Educator::class)->create(['user_id' => $user->all()->last()->id]);
//
//        factory(User::class)->make()->create(['firstname_en' => uniqid(), 'email' => uniqid()]);
//        $educator2 = factory(Educator::class)->create(['user_id' => $user->all()->last()->id]);
//
//        factory(User::class)->make()->create(['firstname_en' => uniqid(), 'email' => uniqid()]);
//        $student1 = factory(Student::class)->create(['user_id' => $user->all()->last()->id]);
//
//        $this->actingAs(Auth::loginUsingId(1))
//            ->visit('/admin/educator')
//            ->dontSee($student1->profile->firstname)
//            ->see($educator1->profile->firstname)
//            ->see($educator2->profile->firstname);
//    }

//    public function testDelete()
//    {
//
//        $user = App::make(User::class);
//
//        factory(User::class)->make()->create(['firstname_en' => uniqid(), 'email' => uniqid()]);
//        $educator = factory(Educator::class)->create(['user_id' => $user->all()->last()->id]);
//
//        factory(User::class)->make()->create(['firstname_en' => uniqid(), 'email' => uniqid()]);
//        $student = factory(Student::class)->create(['user_id' => $user->all()->last()->id]);
//
//        factory(UserLevel::class)->create(['user_id' => $educator->profile->id, 'level_id' => 2]);
//        factory(UserSubject::class)->create(['user_id' => $educator->profile->id, 'subject_id' => 2]);
//        factory(UserSubject::class)->create(['user_id' => $educator->profile->id, 'subject_id' => 3]);
//
//        $questionBody = uniqid();
//        $answerBody = uniqid();
//        $subjectID = 2;
//        $levelID = 2;
//
//        $question = factory('App\Src\Question\Question')->create([
//            'body_en'    => $questionBody,
//            'user_id'    => $student->profile->id,
//            'subject_id' => $subjectID,
//            'level_id'   => $levelID
//        ]);
//
//        $answer = factory('App\Src\Answer\Answer')->create([
//            'question_id' => $question->id,
//            'user_id'     => $educator->profile->id,
//            'body_en'     => $answerBody,
//            'parent_id'   => 0
//        ]);
//
//        $answers = factory('App\Src\Answer\Answer', 5)->create([
//            'question_id' => $question->id,
//            'user_id'     => $educator->profile->id,
//            'body_en'     => $answerBody,
//            'parent_id'   => $answer->id
//        ]);
//
//        $this->seeInDatabase('user_levels', ['user_id' => $educator->profile->id, 'level_id' => 2]);
//        $this->seeInDatabase('user_subjects', ['user_id' => $educator->profile->id, 'subject_id' => 3]);
//
//        $this->actingAs(Auth::loginUsingId(1));
//        $this->call('DELETE', '/admin/educator/' . $educator->id);
//
//        $this->seeInDatabase('questions', ['id' => $question->id]);
//        $this->notSeeInDatabase('answers', ['id' => $answers->first()->id]);
//        $this->notSeeInDatabase('answers', ['id' => $answers->last()->id]);
//        $this->notSeeInDatabase('user_levels', ['user_id' => $educator->profile->id]);
//        $this->notSeeInDatabase('user_subjects', ['user_id' => $educator->profile->id]);
//    }


//    public function testDeactivateSubjects()
//    {
//        $user = App::make(User::class);
//
//        factory(User::class)->make()->create(['firstname_en' => uniqid(), 'email' => uniqid()]);
//        $educator = factory(Educator::class)->create(['user_id' => $user->all()->last()->id]);
//
//    }
}
