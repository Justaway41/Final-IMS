<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TodoInternController extends Controller
{
    public function index(){
        return view('todo.intern.index');
    }

    public function create(){
        $users = User::all();
        return view('todo.intern.create', ['users'=>$users]);
    }

    public function store(Request $req){
        dd($req);
    }

    public function edit(){

    }

    public function update(){

    }

    public function destroy(){

    }
    
}
