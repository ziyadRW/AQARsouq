<?php

namespace Modules\User\Repositories;

use Modules\User\Entities\User;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserRepositoryInterface
{
    public function createUser(array $data)
    {
        $user = User::create($data);
        Auth::login($user);
        return $user;
    }

    public function loginUser(array $credentials)
    {
        if (Auth::attempt($credentials)) {
            return Auth::user();
        }

        return null;
    }
}
