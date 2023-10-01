<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function staff()
    {
        $staff = User::role('staff')->get();
        $title = "Admin | Staff";
        return view('admin.staff',compact('staff','title'));
    }
    public function customer()
    {
        $customer = User::role('customer')->get();
        $title = "Admin | Customer";
        return view('admin.customer',compact('customer','title'));
    }
    public function register(Request $request)
    {
        $method = $request->method();
        switch ($method) {
            case 'POST':
                $user = $request->validate([
                    'first_name'=>'required',
                    'last_name'=>'required',
                    'username'=>'required',
                    'email'=>'unique:users|required',
                    'nik'=>'required|numeric',
                    'address'=>'required',
                    'password'=>'required|min:8|confirmed',
                    'password_confirmation'=>'required',
                    'phone'=>'required'
                ]);
                $user['password'] = bcrypt($user['password']);
                User::create($user)->assignRole('customer');
                return redirect('/login');
                break;
            
            case 'PUT':
                $params = $request->route('username');
                $user = $request->validate([
                    'first_name'=>'required',
                    'last_name'=>'required',
                    'username'=>'required',
                    'email'=>'unique:users|required',
                    'nik'=>'required|numeric',
                    'address'=>'required',
                    'phone'=>'required'
                ]);
                User::where('username',$params)->update([
                    'first_name'=>$user['first_name'],
                    'last_name'=>$user['last_name'],
                    'username'=>$user['username'],
                    'email'=>$user['email'],
                    'nik'=>$user['nik'],
                    'address'=>$user['address'],
                    'phone'=>$user['phone']
                ]);
                // return redirect()->route('profile',['username'=>$params]);
                return redirect('/dashboard');
        }
        return view('user.register',["title"=>"Register"]);
    }
    public function login(Request $request)
    {
        $method = $request->method();
        switch ($method) {
            case 'POST':
                $credentials = $request->validate([
                    'email' => 'required',
                    'password' => 'required',
                ]);
        
                if (Auth::attempt($credentials, $request->remember)) {
                    $request->session()->regenerate();
                    if ($request->user()->hasRole('admin')) {
                        return redirect()->intended('/admin');
                    }
                    if ($request->user()->hasRole('staff')) {
                        return redirect()->intended('/staff');
                    }
                    if ($request->user()->hasRole('customer')) {
                        return redirect()->intended('/home');
                    }
                }
                return back()->with('loginError', 'email atau password salah');
                break;
            
        }
        return view('user.login',["title"=>"Login"]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
    
}
