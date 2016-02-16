<?php

use App\Events\UserRegistered;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class AuthControllerTest extends TestCase
{

    use DatabaseTransactions;
//    use WithoutMiddleware;

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

    public function testLoginPage()
    {
        $this->visit('/auth/login')->assertResponseOk();
    }

    public function testEducatorRegisterationPage()
    {
        $this->visit('/register/educator')->assertResponseOk();
    }
    public function testStudentRegisterationPage()
    {
        $this->visit('/register/student')->assertResponseOk();
    }

    public function testRegisterStudent()
    {
//        $this->withoutEvents();

        $email = uniqid() . '@email.com';
        $firstname = uniqid();
        $levels = [1];

        $this->visit('/register/student')
            ->type($email, 'email')
            ->type($firstname, 'firstname_en')
            ->type($firstname, 'lastname_en')
            ->type('password', 'password')
            ->type('password', 'password_confirmation')
            ->storeInput('levels', $levels, true)
            ->press('Register');

        $this->seeInDatabase('users',
            [
                'email'        => $email,
                'firstname_en' => $firstname,
                'active'       => '0'
            ]);

        $user = \App\Src\User\User::where('email', $email)->first();

        $this->assertEquals('NP10',substr($user->np_code,0,4));

        $this->seeInDatabase('students',
            [
                'user_id' => $user->id
            ]);
        $this->seeInDatabase('user_levels',
            [
                'user_id'  => $user->id,
                'level_id' => array_pop($levels)
            ]);


        // activate account
        $this->visit('/account/activate/' . $user->activation_code);

        $this->seeInDatabase('users',
            [
                'email'        => $email,
                'firstname_en' => $firstname,
                'active'       => '1'
            ]
        );
    }

    public function testRegisterEducator()
    {
//        $this->withoutEvents();

        $email = uniqid() . '@email.com';
        $firstname = uniqid();
        $levels = [1];
        $subjects = [1];

        $qualification = 'asdasd';

        $this->visit('/register/educator')
            ->type($email, 'email')
            ->type($firstname, 'firstname_en')
            ->type($firstname, 'lastname_en')
            ->type('password', 'password')
            ->type('password', 'password_confirmation')
            ->type($qualification, 'qualification')
            ->storeInput('levels', $levels, true)
            ->storeInput('subjects', $subjects, true)
            ->press('Register');

//        $this->expectsEvents(\App\Listeners\SendAdminSubjectRequestMail::class);
//        $this->expectsEvents(\App\Listeners\SendEducatorSubjectPendingAdminApprovalMail::class);

        $this->seeInDatabase('users',
            [
                'email'        => $email,
                'firstname_en' => $firstname,
                'active'       => '0',
                'admin' => 0
            ]);

        $user = \App\Src\User\User::where('email', $email)->first();

        $this->assertEquals('NP99',substr($user->np_code,0,4));

        $this->seeInDatabase('educators',
            [
                'user_id'       => $user->id,
                'qualification' => $qualification
            ]);
        $this->seeInDatabase('user_levels',
            [
                'user_id'  => $user->id,
                'level_id' => array_pop($levels)
            ]);

        $this->seeInDatabase('user_subjects',
            [
                'user_id'    => $user->id,
                'subject_id' => array_pop($subjects),
                'active'     => 0
            ]);

        $this->visit('/account/activate/' . $user->activation_code);

        $this->seeInDatabase('users',
            [
                'email'        => $email,
                'firstname_en' => $firstname,
                'active'       => '1',
                'admin' => 0
            ]
        );
    }

    public function testUserCanLogin()
    {
        $email = uniqid().'@abc.com';
        $name = uniqid();
        $password = 'password';
        $active = 1;
        $user = factory(\App\Src\User\User::class,1)->create([
            'firstname_en'=>$name, 'email'=>$email,'np_code'=>uniqid(),'password'=>bcrypt($password),'active'=>$active
        ]);
        $response = $this->call('POST','/auth/login',['email'=>$email,'password'=>$password,'_token' => csrf_token()]);
        $this->assertSessionHas('userType','User');
        $this->visit('/home')->see($name);
    }

    public function testEducatorCanLogin()
    {
        $email = uniqid().'@abc.com';
        $name = uniqid();
        $password = 'password';
        $active = 1;
        $user = factory(\App\Src\User\User::class,1)->create([
            'firstname_en'=>$name, 'email'=>$email,'np_code'=>uniqid(),'password'=>bcrypt($password),'active'=>$active
        ]);
        $user->educator()->create([]);
        $response = $this->call('POST','/auth/login',['email'=>$email,'password'=>$password,'_token' => csrf_token()]);
        $this->assertSessionHas('userType','Educator');
        $this->visit('/home')->see($name);
    }

    public function testStudentCanLogin()
    {
        $email = uniqid().'@abc.com';
        $name = uniqid();
        $password = 'password';
        $active = 1;
        $user = factory(\App\Src\User\User::class,1)->create([
            'firstname_en'=>$name, 'email'=>$email,'np_code'=>uniqid(),'password'=>bcrypt($password),'active'=>$active
        ]);
        $user->student()->create([]);
        $response = $this->call('POST','/auth/login',['email'=>$email,'password'=>$password,'_token' => csrf_token()]);
        $this->assertSessionHas('userType','Student');
        $this->visit('/home')->see($name);
    }

}
