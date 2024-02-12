<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    protected $userRepository;

    // constructor method
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    // login and register views
    public function showRegister()
    {
        return view('auth.register');
    }
    public function showLogin()
    {
        return view('auth.login');
    }

    // register method
    public function register(RegisterRequest $request)
    {
        $userData = $request->validated();
        $this->userRepository->create($userData);

        return redirect()->route('welcome');
    }

    // login method
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('welcome');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // logout method
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    // forgot password view
    public function showForgotPassword()
    {
        return view('auth.forgot_password');
    }
    // forgot password
    public function sendResetLinkEmail(ForgotPasswordRequest $request)
    {
        $user = $this->userRepository->findByEmail($request->email);

        if (!$user) {
            return back()->withErrors(['email' => 'User not found']);
        }

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }

    // reset password
    public function changePassword(ResetPasswordRequest $request)
    {
        $user = $this->userRepository->findByEmail($request->email);

        if (!$user) {
            return back()->withErrors(['email' => 'User not found']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route("loginForm")->with('status', 'Password changed successfully');
    }
}
