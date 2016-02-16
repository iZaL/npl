<?php

use App\Events\UserRegistered;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class RoutesTest extends TestCase
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

    public function testEducatorMiddlewareRoutesRedirects()
    {
        $this->visit('/educator/questions')->seePageIs('/auth/login');
    }

    public function testEducatorMiddlewareRoutesDoesNotRedirectForEducators()
    {
        session()->put('userType','Educator');
        $user = $this->createEducator();
        $this->actingAs($user)->visit('/educator/questions')->seePageIs('/educator/questions');

        session()->put('userType','Student');
        $user = $this->createStudent();
        $this->actingAs($user)->visit('/educator/questions')->seePageIs('/student/questions');
    }

    public function testStudentMiddlewareRoutesRedirects()
    {
        $this->visit('/educator/questions')->seePageIs('/auth/login');
    }

    public function testStudentMiddlewareRoutesDoesNotRedirectForStudents()
    {
        session()->put('userType','Student');
        $user = $this->createStudent();
        $this->actingAs($user)->visit('/student/questions')->seePageIs('/student/questions');

        session()->put('userType','Educator');
        $user = $this->createEducator();
        $this->actingAs($user)->visit('/student/questions')->seePageIs('/educator/questions');
    }

    public function testContactPage()
    {
        $this->visit('contact')->assertResponseOk();
    }
    public function testEducatorPage()
    {
        $this->visit('educator')->assertResponseOk();
    }
    public function testStudentPage()
    {
        $this->visit('student')->assertResponseOk();
    }

}
