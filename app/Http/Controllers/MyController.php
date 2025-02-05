<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class MyController extends Controller
{
    public function user(){
        $id = Auth()->id;
        //count total task
        $totalTasks = Task::where('user_id', $id)->count();
        return view(
            'pages.dashboard',
            [
                'totalTasks' => $totalTasks
            ]
        );
    }
}
