<?php

use App\Src\Educator\Educator;
use App\Src\Student\Student;
use App\Src\Subject\UserSubject;
use App\Src\User\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class AdminSubjectControllerTest extends TestCase
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
        factory('App\Src\Subject\Subject')->create(['name_en' => $subjectName1]);
        factory('App\Src\Subject\Subject')->create(['name_en' => $subjectName2]);

        $admin = $this->createUser(['admin'=>1],[],[]);
        $this->actingAs($admin)
            ->visit('/admin/subject')
            ->see($subjectName1)
            ->see($subjectName2);

    }

    public function testStore()
    {
        $subjectName1 = uniqid();
        $admin = $this->createUser(['admin'=>1],[],[]);
        $this->actingAs($admin)
            ->visit('admin/subject/create')
            ->type($subjectName1, 'name_en')
            ->press('Save')
            ->seeInDatabase('subjects', ['name_en' => $subjectName1]);

    }

    public function testDelete()
    {
        $subjectName1 = uniqid();
        $subjectName2 = uniqid();
        $questionBody = uniqid();
        $answerBody = uniqid();

        $subject1 = factory('App\Src\Subject\Subject')->create(['name_en' => $subjectName1]);
        $subject2 = factory('App\Src\Subject\Subject')->create(['name_en' => $subjectName2]);

        $educator1 =$this->createEducator([],[$subject1->id],[1]);
        $educator2 =$this->createEducator([],[$subject2->id],[2]);
        $student1 =$this->createStudent([],[$subject1->id],[2]);

        factory(UserSubject::class)->create([
            'user_id'    => $educator1->id,
            'subject_id' => $subject1->id
        ]);

        factory(UserSubject::class)->create([
            'user_id'    => $educator2->id,
            'subject_id' => $subject2->id
        ]);

        $question = factory('App\Src\Question\Question')->create([
            'body_en'    => $questionBody,
            'user_id'    => $student1->id,
            'subject_id' => $subject1->id,
        ]);

        $answer = factory('App\Src\Answer\Answer')->create([
            'question_id' => $question->id,
            'user_id'     => $educator1->id,
            'body_en'     => $answerBody,
            'parent_id'   => 0
        ]);

        $answers = factory('App\Src\Answer\Answer', 5)->create([
            'question_id' => $question->id,
            'user_id'     => $educator1->id,
            'body_en'     => $answerBody,
            'parent_id'   => $answer->id
        ]);


        $admin = $this->createUser(['admin'=>1],[],[]);
        $this->actingAs($admin);
        $this->call('DELETE', '/admin/subject/' . $subject1->id);

        $this->notSeeInDatabase('questions', ['id' => $question->id]);
        $this->notSeeInDatabase('answers', ['id' => $answers->first()->id]);
        $this->notSeeInDatabase('answers', ['id' => $answers->last()->id]);
        $this->notSeeInDatabase('subjects', ['id' => $subject1->id]);
        $this->notSeeInDatabase('user_subjects', ['user_id' => $educator1->id, 'subject_id' => $subject1->id]);

        $this->seeInDatabase('user_subjects',
            ['user_id' => $educator2->id, 'subject_id' => $subject2->id]);
    }

}
