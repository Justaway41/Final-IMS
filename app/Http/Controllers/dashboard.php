<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboard extends Controller
{
    public function index()
    {
        $worklogs = Auth::user()->worklogs;

        return view('dashboard', ['worklogs' => $worklogs]);
    }
}
