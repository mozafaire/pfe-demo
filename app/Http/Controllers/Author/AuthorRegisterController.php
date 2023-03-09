<?php

namespace App\Http\Controllers\Author;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\Author;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\Guard;

class AuthorRegisterController extends Controller
{
   public function create(Request $request){
    $request->validate([
        'first_name' => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    $author = new author();
    $author->first_name = $request->first_name;
    $author->last_name = $request->last_name;
    $author->email = $request->email;
    $author->password = Hash::make($request->password);
    $data = $author->save();
    return redirect()->intended('author/login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

    
        $credentials = $request->only('email', 'password');
        if (Auth::guard('author')->attempt($credentials)) {
            return redirect()->intended('author/home')
                        ->withSuccess('Signed in');
        }
   
        return redirect()->back()->with('error','invalid information'); 
    } 

    public function logout(){
        Auth::guard('author')->logout();
        return redirect('/');
    }
}
