<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Src\Educator\Educator;
use App\Src\Student\Student;
use App\Src\User\User;
use App\Src\User\UserRepository;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateUserCode
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    const EDUCATORPREFIX = 'NP99';
    const STUDENTPREFIX = 'NP10';
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        //
        $this->userRepository = $userRepository;
    }

    /**
     * Handle the event.
     *
     * @param  UserRegistered $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        $user = $event->user;
        $npCode = $this->generateCode($user);
        if (!$user->np_code) {
            $user->np_code = $npCode;
            $user->save();
        }
    }

    public function generateCode($user)
    {
        $prefix = $this->generatePrefix($user);
        $code = $this->generateNplCode();
        $finalCode = $prefix.$code;
        return $finalCode;
    }

    public function generatePrefix($user)
    {
        $prefix = '';
        $userType = $user->getType();
        if(is_a($userType,Educator::class)){
            $prefix = self::EDUCATORPREFIX;
        } elseif(is_a($userType,Student::class)) {
            $prefix = self::STUDENTPREFIX;
        }
        return $prefix;
    }
    /**
     *
     */
    private function generateNplCode()
    {
        $code = $this->generateRandomInteger();

        if ($this->codeExists($code)) {
            $this->generateNplCode();
        }

        return $code;
    }

    public function generateRandomInteger($start = 1000,$end=9999)
    {
        return rand($start,$end);
    }

    private function codeExists($code)
    {
        $code = $this->userRepository->model->whereNpCode($code)->whereNpCode(self::EDUCATORPREFIX.$code)->whereNpCode(self::STUDENTPREFIX.$code)->first();

        if ($code) {
            return true;
        }

        return false;
    }
}
