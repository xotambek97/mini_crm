<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
class AdminController extends Controller
{
    //

      public function admin()
    {
        $user = Auth::user();  
       
       if (Gate::allows('admin', $user)) {
         return view('admin.admin');
        }
        else{
            return redirect()->back();
        }
    }

    public  function login(){
        return view('admin.index');
    }

    public  function register(){
        return view('admin.register');
    }
    public function admin_tables(){
    return view('admin.admin');
    }
}
