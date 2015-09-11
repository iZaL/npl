<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class AuthControllerTest extends TestCase
{

    use DatabaseTransactions;
    use WithoutMiddleware;

    protected $user;
    protected $subjects;
    protected $levels;

    /**
     * @var
     */
    private $faker;

    public function setUp()
    {
        parent::setUp();
    }

    public function testRegisterStudent()
    {
//        $this->user = factory('App\Src\User\User', 1)->create(['email' => uniqid() . '@email.com']);
//        $this->subjects = factory('App\Src\Subject\Subject', 3)->create(['name_en' => uniqid()]);
//        $this->levels = factory('App\Src\Level\Level', 3)->create(['name_en' => uniqid()]);

        $email = uniqid().'@email.com';
        $firstname = uniqid();
        $levels = [1];

        $this->visit('/register/student')
            ->type($email, 'email')
            ->type($firstname, 'firstname_en')
            ->type('password', 'password')
            ->type('password', 'password_confirmation')
            ->storeInput('levels', $levels, true)
            ->press('Register');

        $this->seeInDatabase('users',
            [
                'email'        => $email,
                'firstname_en' => $firstname
            ]);

        $user = \App\Src\User\User::where('email', $email)->first();

        $this->seeInDatabase('students',
            [
                'user_id' => $user->id
            ]);
        $this->seeInDatabase('user_levels',
            [
                'user_id' => $user->id,
                'level_id' => array_pop($levels)
            ]);

        $this->onPage('/auth/login');
    }

    public function testRegisterEducator()
    {
        $email = uniqid().'@email.com';
        $firstname = uniqid();
        $levels = [1];
        $subjects = [1];

        $this->visit('/register/educator')
            ->type($email, 'email')
            ->type($firstname, 'firstname_en')
            ->type('password', 'password')
            ->type('password', 'password_confirmation')
            ->storeInput('levels', $levels, true)
            ->storeInput('subjects', $subjects, true)
            ->press('Register');

        $this->seeInDatabase('users',
            [
                'email'        => $email,
                'firstname_en' => $firstname
            ]);

        $user = \App\Src\User\User::where('email', $email)->first();

        $this->seeInDatabase('educators',
            [
                'user_id' => $user->id
            ]);
        $this->seeInDatabase('user_levels',
            [
                'user_id' => $user->id,
                'level_id' => array_pop($levels)
            ]);

        $this->seeInDatabase('user_subjects',
            [
                'user_id' => $user->id,
                'subject_id' => array_pop($subjects)
            ]);

        $this->onPage('/auth/login');
    }



}