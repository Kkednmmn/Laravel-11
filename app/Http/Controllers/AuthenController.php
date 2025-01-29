<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthenController extends Controller
{
    /**
     * แสดงหน้า Register
     */
    public function Register()
    {
        return view('register'); 
    }    

    /**
     * บันทึกข้อมูล Register
     */
    public function Store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        Auth::login($user);
        return redirect()->route('profiles.index')->with('success', 'Registration successful!'); // ✅ เปลี่ยนไปที่หน้า profiles
    }
    

    /**
     * แสดงหน้า Login
     */
    public function Login()
    {
        return view('login');
    }    

    /**
     * ตรวจสอบข้อมูล Login
     */
    public function Authen(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('profiles.index')->with('success', 'Login Successful'); // ✅ เปลี่ยนไปที่หน้า profiles
        }
    
        return back()->withErrors(['email' => 'Invalid email or password'])->withInput();
    }
    
    

    /**
     * Logout
     */
    public function Logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.form')->with('success', 'You have been logged out.');
    }
}
