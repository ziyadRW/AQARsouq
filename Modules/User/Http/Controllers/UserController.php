<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\User\Features\CreateUserFeature;
use Modules\User\Features\LoginUserFeature;

class UserController extends Controller
{

    //this is dep injection
    protected $createUserFeature;
    protected $loginUserFeature;

    public function __construct(CreateUserFeature $createUserFeature, LoginUserFeature $loginUserFeature)
    {
        $this->createUserFeature = $createUserFeature;
        $this->loginUserFeature = $loginUserFeature;
    }

    public function create()
    {
        return inertia('User/Create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $this->createUserFeature->handle($data);
        
        return redirect()->intended(route('listings.index'))->with('success', 'Account created and logged in!');
    }

    public function login()
    {
        return inertia('User/Login');
    }

    public function auth(Request $request)
    {
        return $this->loginUserFeature->handle($request);
    }

    public function destroy(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('listings.index')->with('success', 'Logged out successfully');
    }
}
