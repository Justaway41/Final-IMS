<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Password;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $users =  User::whereRelation('role', 'title', 'Intern')->whereRelation('department', 'department_name', Auth::user()->department->department_name)->paginate(5);
        if (Auth::user()->role->title == "Admin") {
            $users =  User::latest()->paginate(5);
        }

        return view('user.index', ['users' => $users]);
    }

    public function create()
    {
        $users = User::get();
        $roles = Role::get();
        $departments = Department::get();
        return view('user.create', ['users' => $users, 'roles' => $roles, 'departments' => $departments]);
    }

    public function store(UserFormRequest $request)
    {
        $request->validated();
        User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => bcrypt("nice"),
            'birthday' => $request->birthday,
            'contact' => $request->contact,
            'address' => $request->address,
            'photo' => $this->storeImage($request),    //$request->photo;
            'department_id' => $request->department_id,
            'role_id' => $request->role_id,
            'contract_status' => $request->contract_status,
            'contract_start_date' => $request->contract_start_date,
            'contract_end_date' => $request->contract_end_date,
            'hourly_rate' => $request->hourly_rate,
            'pan_number' => Crypt::encryptString($request->pan_number),
            'bank_name' => $request->bank_name,
            'bank_account' => Crypt::encryptString($request->bank_account),
        ]);

        Password::sendResetLink($request->only(['email']));

        return redirect(route('users.index'))
            ->with('success', 'User created successfully.');
    }

    public function show($id)
    {
        return view('user.edit', ['users' => User::findOrFail($id)]);
    }

    public function edit($id)
    {
        $roles = Role::get();
        $departments = Department::get();
        return view('user.edit', ['users' => User::findOrFail($id), 'roles' => $roles, 'departments' => $departments]);
    }

    public function update(UserFormRequest $request, $id)
    {
        $request->validated();
        User::where('id', $id)->update(
            $request->except(['_token', '_method'])
        );
        $model = User::findorFail($id);
        $model->pan_number = Crypt::encryptString($request->pan_number);
        $model->bank_account = Crypt::encryptString($request->bank_account);
        $model->update(['pan_number', Crypt::encryptString($request->pan_number), 'bank_account', Crypt::encryptString($request->bank_account)]);
        return redirect(route('users.index'))
            ->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect(route('users.index'))
            ->with('success', 'User deleted successfully.');
    }

    public function profile()
    {
        return view('user.profile');
    }

    private function storeImage($request)
    {
        $newImageName = uniqid() . '.' . $request->photo->extension();

        return $request->photo->store('userImages', 'public', $newImageName);
    }
}
