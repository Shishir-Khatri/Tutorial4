<?php
namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    // Show registration page
    public function showRegister()
    {
        return view('auth.register');
    }


    // Process registration
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);


        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'user',
        ]);


        // Log in the newly registered user
        Auth::login($user);


        // Regenerate session ID for security
        $request->session()->regenerate();


        return redirect()->route('dashboard');
    }


    // Show login page
    public function showLogin()
    {
        return view('auth.login');
    }


    // Process login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if (Auth::attempt($credentials)) {


            // Regenerate session ID after successful login
            $request->session()->regenerate();


            return redirect()->intended(route('dashboard'));
        }


        return back()
            ->withErrors([
                'email' => 'Invalid email or password.',
            ])
            ->onlyInput('email');
    }


    // Log out
    public function logout(Request $request)
    {
        Auth::logout();


        // Invalidate the current session
        $request->session()->invalidate();


        // Generate a new CSRF token
        $request->session()->regenerateToken();


        return redirect()->route('login');
    }


    // Authenticated dashboard
    public function dashboard()
    {
        return view('auth/dashboard');
    }
}