<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
# use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

// use Session;

class MyAuthController extends Controller
{

    public function index() {
        return view('auth.login');
    }  
      

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) 
        {
            session(['user' => $request->get('email')]);
            return redirect()->intended('products')->withSuccess('Signed in');
        }
  
        return redirect("login")->withSuccess('Login details are not valid.');
    }



    public function registration()
    {
        return view('auth.register');
    }
      

    public function customRegistration(Request $request)
    {  /*
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]); */

       /* $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect(route('register-user'))->withErrors($validator)->withInput();
        }        
           
         Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ])->validate(); // redirección automatica
        
        User::create($validatedData);   
        
        */

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);         
   
        $this->create($request->all());       

        return redirect('login')->withSuccess('You have successfully signed-in');
    }


    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    
    

    public function dashboard(){
        return view('auth/dashboard');
    }


    public function signOut() 
    {
        /* $request = new Request(); $request->session()->get('key'); print_r(session()->all()); */
        session()->flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
