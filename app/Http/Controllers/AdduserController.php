<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdduserController extends Controller
{
    //Add User Page
    public function index()
    {
        return view('pages.admin.add-user');
    }
}
