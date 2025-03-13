<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Display a list of users
    public function index()
    {
        $users = User::all();
        return view('users', compact('users'));
    }

    // Store a new user
    public function userCreate()
    {
        $user_name = $_POST['username'];
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];

        $user = new User;
        $user->name = $user_name;
        $user->email = $user_email;
        $user->password = bcrypt($user_password);
        $user->save();
        return redirect()->back();
    }

    // Delete a user
    public function userDestroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }

    // Show the form for editing a user
    public function userEdit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        $users = DB::table('users')->get();
        return view('users', compact('user', 'users'));
    }

    // Update a user's data
    public function userUpdate()
    {
        $id = $_POST['id'];
        $user = User::find($id);
        $user->update([
            'name' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => bcrypt($_POST['password']),
        ]);
        return redirect('users');
    }
}
