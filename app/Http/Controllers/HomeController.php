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
        }else if($role=='2')
        {
            return redirect()->route('ordens.create');
        }else if($role=='3')
        {
            return redirect()->route('cocina.index');
        }else{
            return redirect()->route('admin.dashboard');
        }
    }
}
