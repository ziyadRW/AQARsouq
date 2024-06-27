<?php

namespace Modules\User\Features;

use Modules\User\Repositories\UserRepositoryInterface;

class CreateUserFeature
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(array $data)
    {
        $validatedData = $this->validate($data);
        $validatedData['password'] = bcrypt($validatedData['password']);

        return $this->userRepository->createUser($validatedData);
    }

    protected function validate(array $data)
    {
        return validator($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ])->validate();
    }
}
