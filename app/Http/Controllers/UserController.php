<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    /**
     * @param Request $request
     */
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            //higher level component for notification
            //auth()->user()->notify(new \App\Notifications\LoginEmailActivityNotification());

            //event(new \App\Events\UserLoggedInEvent(auth()->user()));

            //basic component
            //Mail::to($request->email)->send(new \App\Mail\LoginActivityEmail('Kuala Terengganu'));
            //another line of codes

            //feature send data to logging center system

            return redirect()->intended('/manage/overview')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withError('Login details are not valid');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    /**
     * @param Request $request
     */
    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('You have signed-in');
    }

    /**
     * @param array $data
     */
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function dashboard()
    {
        if (Auth::check()) {

            return view('dashboard.dashboard');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function signOut()
    {

        auth()->logout();
        return redirect()->route('login');
    }

}
