<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Role\StoreRoleRequest;
use App\Http\Requests\Admin\Role\UpdateRoleRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables as DataTablesDataTables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
      //  $roles = Role::all();
      if ($request->ajax()) {

        $data = Role::latest()->get();

        return DataTablesDataTables::of($data)

                ->addIndexColumn() 
                ->addColumn('action', function($row){
                    $btn = '<a href="' . route('admin.role.edit', ['role' => $row->id]) . '" class="edit_model" data-id="' . $row->id . '"><i class="feather feather-edit-3 me-3"></i></a>
       ';
    //    <a href="javascript:void(0)" class="delete_model" data-id="' . $row->id . '"><i class="feather feather-trash-2 me-3"></i></a>
            return $btn;
                })

                ->rawColumns(['action'])

                ->make(true);

    }
        return view('admin.role.index');
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
    public function store(StoreRoleRequest $request)
    {
        Role::create($request->validated());
        return back()->with('success', "Role Created Successfully");
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
    public function edit(Role $role)
    {
        return view('admin.role.edit', ['role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->validated());
        return redirect()->route('admin.role.index')->with('success', "Role Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
         // dd($role);
        if ($role->users()->exists()) {
            return redirect()->back()->with('error', 'Cannot delete role because it is assigned to users.');
        }

        $role->delete();
        return response()->json('success');
       // return redirect()->back()->with('success', 'Role deleted successfully.');
    }
}
