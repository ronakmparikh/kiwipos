<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function login(Request $req)
    {

        $user= User::where(['email'=>$req->email])->first();
        // return $user->password;
        if(!$user || !Hash::check($req->password,$user->password))
        {
            return "username and paass not match";
        }
        else {
            $req->session()->put('user',$user);
            return redirect('/');
        }
    
    
    }
}
