<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsertaskController extends Controller
{
    public function dashboard()
    {
        $id = Auth::user()->id;
        //count total task
        $totalTasks = Task::where('user_id', $id)->count();
        // dd($totalTasks);

        //count pending task
        $pendingTasks = Task::where('user_id', $id)->where('status', 'pending')->count();

        //count in_progress task
        $inProgressTasks = Task::where('user_id', $id)->where('status', 'in_progress')->count();

        //completed
        $compltedTask = Task::where('user_id', $id)->where('status', 'Completed')->count();

        return view(
            'pages.dashboard',
            [
                'totalTasks' => $totalTasks,
                'pendingTasks' => $pendingTasks,
                'inProgressTasks' => $inProgressTasks,
                'compltedTask' => $compltedTask
            ]
        );
    }

    public function userTask()
    {
        $id = Auth::user()->id;
        $tasks = Task::where('user_id', $id)->get();

        //count all task 
        $taskCount = Task::where('user_id', $id)->count();
        return view('pages.mytask', [
            'tasks' => $tasks,
            'taskCount' => $taskCount
        ]);
    }

    public function editUserTask(Task $task)
    {

        $taskStatus = Task::all();
        return view(
            'pages.edit-task',
            [
                'task' => $task,
                'taskStatus' => $taskStatus
            ]
        );
    }

    public function updateStatus(Request $request, Task $task)
    {
        // dd($task);
        $task->update([
            'status' => $request->status
        ]);

        return redirect()->route('user.mytask');
    }
}
