<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //Dashboard Page Route
    public function dashboard(){
        //get total user
        $totalUser = User::where('role',0)->count();

        //count total task
        $totalTasks = Task::count();

        //count pending task
        $pendingTasks = Task::where('status','pending')->count();

        //count Completed task
        $inProgressTasks = Task::where('status','in_progress')->count();

        //latest user
        $latestUser = User::where('role','0')
                    ->latest()->take(5)->get();

        // dd($latestUser);
        return view('pages.admin.dashboard',
        [
            'totalUser'=>$totalUser,
            'totalTasks'=>$totalTasks,
            'latestUser'=>$latestUser,
            'pendingTasks'=>$pendingTasks,
            'inProgressTasks'=>$inProgressTasks

        ]);
    }
}
