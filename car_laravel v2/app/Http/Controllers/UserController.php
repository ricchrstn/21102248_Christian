<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();
        
        if ($request->has('role')) {
            $query->where('role', $request->role);
        }
        
        $users = $query->orderBy('role', 'asc')
                      ->orderBy('name', 'asc')
                      ->get();
        
        return view('user.index', compact('users'));
    }
}
