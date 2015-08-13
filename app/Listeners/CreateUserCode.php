<?php

namespace App\Listeners;

use App\Events\UserRegistered;
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

    const CODEPREFIX = 'NP';
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

        if (!$user->np_code) {
            $code = $this->generateNplCode();
            $user->np_code = $code;
            $user->save();
        }

    }

    /**
     *
     */
    private function generateNplCode()
    {
        $randomCode = $this->generateRandomString();

        $code = self::CODEPREFIX . $randomCode;

        if ($this->codeExists($code)) {
            $this->generateNplCode();
        }

        return $code;
    }

    public function generateRandomString($length = 5)
    {
        return strtoupper(substr(str_shuffle(MD5(microtime())), 0, $length));
    }

    private function codeExists($code)
    {
        $code = $this->userRepository->model->whereNpCode($code)->first();

        if ($code) {
            return true;
        }

        return false;
    }
}
