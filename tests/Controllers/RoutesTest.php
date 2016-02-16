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

    public function testEducatorMiddlewareRoutes()
    {
        $response = $this->call('GET','/educator/questions');
        $this->assertEquals($response->getStatusCode(),500);
//        $this->assertRedirectedTo('/auth/login');
    }
    public function testEducatorMiddlewareRouteRedirects()
    {
        $this->call('GET','/educator/questions');
        $this->assertRedirectedTo('/auth/login');
    }
//    public function testStudentMiddlewareRoutes()
//    {
//        $response = $this->call('GET','/student/questions');
//        $this->assertEquals($response->getStatusCode(),500);
//    }
}
