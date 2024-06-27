<?php

namespace Modules\User\Repositories;

interface UserRepositoryInterface
{
    public function createUser(array $data);
    public function loginUser(array $credentials);
}
