<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserDashController extends Controller
{
    public function index()
    {
        $users = User::all();
        $roles = ['All', 'Admin', 'SuperAdmin'];
        return view('admin.users.index', compact('users', 'roles'));
    }
}
