<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index', [
            'message' => Message::where('status', '0')->count(),
            'user' => User::where('role', '!=', 'admin')->count(),
            'allUser' => User::where('role', '!=', 'admin')->latest()->paginate(5)
        ]);
    }
}
