<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    // Display a list of tasks
    public function index()
    {
        $tasks = DB::table('tasks')->get();
        return view('tasks', data: compact('tasks'));
    }

    // Store a new task
    public function create()
    {
        $task_name = $_POST['name'];
        DB::table('tasks')->insert(['name' => $task_name]);
        return redirect()->back();
    }

    // Delete a task
    public function destroy($id)
    {
        DB::table('tasks')->where('id', $id)->delete();
        return redirect()->back();
    }

    // Show the form for editing a task
    public function edit($id)
    {
        $task = DB::table('tasks')->where('id', $id)->first();
        $tasks = DB::table('tasks')->get();
        return view('tasks', data: compact('task', 'tasks'));
    }

    // Update a task's data
    public function update()
    {
        $id = $_POST['id'];
        DB::table('tasks')->where('id', '=', $id)->update(['name' => $_POST['name']]);
        return redirect('tasks');
    }
}
