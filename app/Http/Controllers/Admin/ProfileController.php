<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Profile\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
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
    public function create()
    {
        //
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
        return view('admin.profile.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request, User $user)
    {
        $user->update($request->validated());
        return to_route('admin.profile.edit', $user->id)->with('success', "Profile Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function profileImage(Request $request)
    {
        $user = User::where('id', Auth::id())
            ->first();
        $validator = $request->all();

        if ($request->hasFile('image')) {
            $imageName = uniqid() . "." . $request->image->extension();
            $request->image->move(public_Path('profile'), $imageName);
            $validator['profile'] = $imageName;
        }
        // dd($validator);
        $user->update(['profile' => $validator['profile']]);
        return response()->json(1);
    }
}
