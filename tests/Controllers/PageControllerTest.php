<?php

use App\Events\UserRegistered;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class PageControllerTest extends TestCase
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

}
