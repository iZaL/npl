<?php

use App\Src\User\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class AnswerControllerTest extends TestCase
{

    use DatabaseTransactions;
    use WithoutMiddleware;

    protected $user;

    public function setUp()
    {
        parent::setUp();


    }

    public function testAnswerIsSuccessful()
    {
        $educator = User::find(2); // Educator
        $student = User::find(3); // student

        $questionBody = 'How much is 1+1 ? ';
        $answerBody = 'answer is 2 ';
        $question = factory('App\Src\Question\Question',
            1)->create(['user_id' => $student->id, 'subject_id' => 3, 'body_en' => $questionBody]);

        $this->actingAs($educator)
            ->visit('/question/'.$question->id.'/answer')
            ->type($question->id, 'question_id')
            ->type($answerBody, 'body_en')
            ->press('Submit');

        $this->seeInDatabase('answers',
            [
                'body_en'    => $answerBody,
                'user_id'    => $educator->id,
                'question_id' => $question->id,
                'parent_id ' => 0,
            ]);

        $this->onPage('question/'.$question->id.'/answer');

    }

//    public function testUpdate()
//    {
//        $blog = factory('App\Src\Blog\Blog', 1)->create();
//
//        $title = uniqid();
//        $this->actingAs($this->user)
//            ->visit('/admin/blog/' . $blog->id . '/edit/')
//            ->type($title, 'title_ar')
//            ->type('description', 'description_ar')
//            ->attach(public_path() . '/img/test.jpg', 'cover')
//            ->press('Save');
//
//        $this->seeInDatabase('blogs',
//            [
//                'title_ar'       => $title,
//                'description_ar' => 'description',
//                'slug'           => str_slug($title)
//            ]);
//
//        $blog = \App\Src\Blog\Blog::where('title_ar', $title)->first();
//
//        $this->seeInDatabase('photos', ['imageable_type' => 'Blog', 'imageable_id' => $blog->id]);
//
//        $photos = \App\Src\Photo\Photo::where('imageable_type', 'Blog')->where('imageable_id',
//            $blog->id)->first();
//
//        $this->fileExists(base_path(public_path() . '/uploads/thumbnail/' . $photos->name));
//
//        unlink(public_path() . '/uploads/thumbnail/' . $photos->name);
//
//        $this->onPage('/admin/blog');
//    }


}
