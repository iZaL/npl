<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    public function storeInput($element, $text, $force = false)
    {
        if ($force) {
            $this->inputs[$element] = $text;
            return $this;
        }
        else {
            return parent::storeInput($element, $text);
        }
    }

    public function createUser($args,$subjects,$levels)
    {
        $email = uniqid().'@abc.com';
        $name = uniqid();
        $password = 'password';
//        $active = 1;
        $user = factory(\App\Src\User\User::class,1)->create(array_merge($args,[
            'firstname_en'=>$name, 'email'=>$email,'np_code'=>uniqid(),'password'=>bcrypt($password)
        ]));
        $subjectArray= [];
        foreach($subjects as $subject) {
            $subjectArray[$subject] = ['active'=>true];
        }
        $user->subjects()->sync($subjectArray);
        $user->levels()->sync($levels);
        return $user;
    }

    public function createEducator($args=[],$subjects=[1],$levels=[1])
    {
        $user = $this->createUser($args,$subjects,$levels);
        $user->educator()->create([]);
        return $user;
    }

    public function createStudent($args=[],$subjects=[1],$levels=[1])
    {
        $user = $this->createUser($args,$subjects,$levels);
        $user->student()->create([]);
        return $user;
    }

}
