<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){

        $user = Auth::user();

        $role = $user->roles->first()->id;

        if($role=='1')
        {
            return redirect()->route('admin.config');
        }else{
            return redirect()->route('ordens.create');
        }
    }
}
