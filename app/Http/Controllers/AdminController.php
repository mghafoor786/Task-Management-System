<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin(){
        $admin =User::all();
        return view('pages.admin',['admin'=>$admin]);
    }
}
