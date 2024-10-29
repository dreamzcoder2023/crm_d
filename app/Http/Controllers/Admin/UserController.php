<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Role\StoreRoleRequest;
use App\Http\Requests\Admin\Role\UpdateRoleRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('admin.user.index', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // dd($request->all());
       $input = $request->all();
       $input['password'] = '12345678';
       $user = User::create($input);
     //  dd($user);
       $user->assignRole('User');
        return redirect()->route('admin.user.index')->with('success', "User Created Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
       // dd($request->all());
        $input = $request->all();
        $user = User::where('id',$id)->first();
        //dd($user);
        $user->update($input);
       // $role->update($request->validated());
        return redirect()->route('admin.user.index')->with('success', "User Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //dd($user);
        $user->delete();
        return redirect()->route('admin.user.index')->with('success',"User Deleted Successfully");
        // if ($role->users()->exists()) {
        //     return redirect()->back()->with('error', 'Cannot delete role because it is assigned to users.');
        // }

        // $role->delete();
        // return redirect()->back()->with('success', 'Role deleted successfully.');
    }
}
