<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function search(Request $request)
    {
        $email = $request->input('email');
        $users = User::where('email', 'like', '%' . $email . '%')->get();
        return view('admin.users', compact('users'));
    }
    public function show($id)
{
    $user = User::findOrFail($id);
    return response()->json($user);
}

public function createAdmin(){
    User::create([
        'name' => 'Admin User',
        'email' => 'admin@example.com',
        'password' => Hash::make('admin5555'),
        'is_admin' => true,
    ]);
}

}

