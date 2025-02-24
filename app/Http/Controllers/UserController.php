<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // Display a list of users
    public function index()
    {
        $users = DB::table('users')->get();
        return view('users', compact('users'));
    }

    // Store a new user
    public function create()
    {
        $user_name = $_POST['name'];
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];

        DB::table('users')->insert([
            'name' => $user_name,
            'email' => $user_email,
            'password' => bcrypt($user_password), // Hash the password
        ]);

        return redirect()->back();
    }

    // Delete a user
    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect()->back();
    }

    // Show the form for editing a user
    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        $users = DB::table('users')->get();
        return view('users', data: compact('user', 'users'));
    }

    // Update a user's data
    public function update()
    {
        $id = $_POST['id'];
        $user_name = $_POST['name'];
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];

        DB::table('users')->where('id', '=', $id)->update([
            'name' => $user_name,
            'email' => $user_email,
            'password' => bcrypt($user_password), // Hash the new password
        ]);

        return redirect('users');
    }
}
