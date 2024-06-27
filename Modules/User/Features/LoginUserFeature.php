<?php

namespace Modules\User\Features;

use Illuminate\Http\Request;
use Modules\User\Repositories\UserRepositoryInterface;

class LoginUserFeature
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($this->userRepository->loginUser($credentials)) {
            return redirect()->intended('dashboard')->with('success', 'Logged in successfully');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
