<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TodoInternController extends Controller
{
    public function index(){
        $tasks = Task::where('user_id', auth()->user()->id)->get();
        return view('todo.intern.index', ['tasks' =>$tasks ]);
    }

    public function create(){

    }

    public function store(Request $req){
        
    }

    public function edit(){

    }

    public function update(){

    }

    public function destroy(){

    }
    
}
