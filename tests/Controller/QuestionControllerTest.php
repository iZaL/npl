<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class QuestionControllerTest extends TestCase
{

    use DatabaseTransactions;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();


    }

    public function testStore()
    {
        $body = uniqid();
        $subjectID = 2;

        $user = Auth::loginUsingId(3); // student

        $this->actingAs($user)
            ->visit('/question/create')
            ->select($subjectID, 'subject_id')
            ->type($body, 'body_en')
            ->press('Submit');

        $level = $user->levels->last();

        $this->seeInDatabase('questions',
            [
                'body_en'    => $body,
                'user_id'    => $user->id,
                'subject_id' => 2,
                'level_id'   => $level->id
            ]);

        $this->onPage('/profile/questions');

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
