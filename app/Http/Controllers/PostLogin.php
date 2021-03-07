<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostLogin extends Controller
{
    //
    public function index()
    {
        # code...
        //if(Auth::)
        $user = User::find(Auth::id());
        //return $user->hasRole('admin');
        if($user->hasRole('admin')){
            //return 'admin';
            return redirect(route('admin'));
        }
        if($user->hasRole('seller')){
            //return 'seller';
            return redirect(route('seller'));
        }
        if($user->hasRole('user')){
            //return 'user';
            return redirect(route('index'));
        }
        return redirect(route('index'));
    }
}
