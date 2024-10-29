<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Profile\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangepasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $user = User::where('id', $request->userId)
            ?->first();
            // dd($user);
        // $color = "";
        if (Hash::check($request->old_password, $user->password)) {
            $color = "green";
            return response()->json($color);
        } else {
            $color = "red";
            return response()->json($color);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChangePasswordRequest $request, User $user)
    {
        // dd($request);
        $validator = $request->validated();
        if (Hash::check($validator['old_password'], $user->password)) {
            $user->update(['password' => $validator['password']]);
            return back()->with('success', "Password Changed Successfully");
        } else {
            return back()->with('error', "Unable To Change Password");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
