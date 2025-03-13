<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;
use Illuminate\Support\Facades\Hash;

class TaskController extends Controller
{
    // Display a list of tasks
    public function index()
    {
        $tasks = Task::all();
        return view('tasks', compact('tasks'));
    }

    // Store a new task
    public function create()
    {
        $task_name = $_POST['name'];
        $task = new Task;
        $task->name = $task_name;
        $task->save();
        return redirect()->back();
    }

    // Delete a task
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->back();
    }

    // Show the form for editing a task
    public function edit($id)
    {
        $task = DB::table('tasks')->where('id', $id)->first();
        $tasks = DB::table('tasks')->get();
        return view('tasks', compact('task', 'tasks'));
    }

    // Update a task's data
    public function update()
    {
        $id = $_POST['id'];
        Task::where('id', $id)->update(['name' => $_POST['name']]);
        return redirect('tasks');
    }
}
