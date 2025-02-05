<?php

namespace App\Http\Controllers;

use App\Mail\TaskEmail;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    //All task page
    public function taskPage()
    {
        $tasks = Task::with('user')->get();

        // dd($users);
        $totalTasks = Task::count();

        return view(
            'pages.admin.all-task',
            [
                'tasks' => $tasks,
                'totalTasks' => $totalTasks
            ]
        );
    }

    //Add task page
    public function allTaskPage()
    {
        $users = User::where('role', 0)->get();
        return view('pages.admin.create-task', ['users' => $users]);
    }

    public function storeTask(Request $request)
    {

        // dd($request->duedate);

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'user' => 'required',
            'duedate' => 'required'
        ]);
        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user,
            'due_date' => $request->duedate
        ]);

        $id = $request->user;

        $toEmail = User::where('id', $id)->first();
        // $t = User::select('id', $id)->get();
        // $e = $t->email;
        // dd($e);     





        $toEmail = $toEmail;
        $message = $request->description;
        $subject = $request->title;

        Mail::to($toEmail)->queue(new TaskEmail($message, $subject));

        // $toEmail = $toEmail;
        // $subject = $request->title;
        // $message = $request->description;

        // Mail::to($toEmail)->send(new TaskEmail($subject,$message));

        return redirect()->route('admin.allTask')->with('addTask', 'New task has been added successfully.');
    }

    public function deleteTask(Task $task)
    {
        $task->delete();

        return redirect()->route('admin.allTask')->with('delete', 'Task deleted successfully..');
    }

    public function editTask(Task $task)
    {

        $users = User::all();
        return view(
            'pages.admin.edit-task',
            [
                'task' => $task,
                'users' => $users
            ]
        );
    }

    public function updateTask(Request $request, Task $task)
    {

        // dd($request->description);
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'duedate' => 'required'
        ]);
        // dd($request->status);
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->status,
            'due_date' => $request->duedate
        ]);

        return redirect()->route('admin.allTask')->with('update', 'Task updated successfully.');
    }

    public function viewTask(Task $task)
    {

        return view('pages.admin.viewtask', ['task' => $task]);
    }




















    public function task()
    {
        $id = Auth()->id;
        // dd($id);

        $tasks = Task::where('user_id', $id)->get();

        // dd($tasks);

        return view('pages.mytask', ['tasks' => $tasks]);
    }
}
