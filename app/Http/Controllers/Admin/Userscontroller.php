<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class Userscontroller extends Controller
{
    public function index()
    {
        $data=User::paginate(2);
        return inertia('admin/user/index',['data'=>$data]);
    }

    public function create()
    {

        return inertia('admin/user/form');
    }

    public function store(Request $request)
    {
        $data=$request->validate([
          'name' => ['required', 'max:50'],
          'email' => ['required', 'email', 'max:50', 'unique:users,email'],
          'password' => ['required', 'min:8', 'max:255'],
        ]);

        User::create($data);
        return redirect()->route('user.create');
    }
}
