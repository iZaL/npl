<?php
namespace App\Src\User;

use App\Src\User\User;

class AuthManager
{

    public $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Register / Activte a User
     * @param $token
     * @return bool
     * @throws \Exception
     */
    public function activateUser($token)
    {
        $user = $this->userRepository->model->where('activation_code', $token)->first();
        if (!$user) {
            throw new \Exception('Invalid Token');
        }
        $this->activate($user);
        return $user;
    }

    /**
     * @param User $user
     */
    private function activate(User $user)
    {
        $user->active = 1;
        // set confirmation code to null
        $user->activation_code = '';
        $user->save();
    }

}