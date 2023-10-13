<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    function index()
    {
        // select data based on page number   select * from users limit 5 offset 5
        // select to get users count
        // links into view
        // abdelaziz
        // select * from users where name like 'abdelaziz'
        // select * from users where id in (1,2,3,4)
        // $users = User::where('id', '>', '5')->orWhere('name', 'like', '%abdelaziz%')->get();
        $users = User::paginate(5);
        return view('users', ['users' => $users]);
    }
    function show($id)
    {
        $user = User::find($id);
        dd($user->orders);
    }
}
