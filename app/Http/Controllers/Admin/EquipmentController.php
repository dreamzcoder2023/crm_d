<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use Illuminate\Http\Request;
use DataTables;
use Yajra\DataTables\DataTables as DataTablesDataTables;

class EquipmentController extends Controller
{
    public function index(Request $request){
        // $equipments = Equipment::all();
        // return view('admin.equipment.index',['equipments' => $equipments]);
        if ($request->ajax()) {

            $data = Equipment::select('*')->orderby('id','desc');

            return DataTablesDataTables::of($data)

                    ->addIndexColumn() 
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" class="edit_model" data-id="' . $row->id . '"><i class="feather feather-edit-3 me-3"></i></a>
                        <a href="javascript:void(0)" class="delete_model" data-id="' . $row->id . '"><i class="feather feather-trash-2 me-3"></i></a>';
                return $btn;
                    })

                    ->rawColumns(['action'])

                    ->make(true);

        }
        return view('admin.equipment.index');
    }
  public function store(Request $request){
    $input = $request->all();
    Equipment::create($input);
    return redirect()->route('admin.equipment.index')->with('success','Equipment Created Successfully');
  }
  public function edit(Request $request){
    $equipment = Equipment::find($request->id);
    $view = View('admin.equipment.edit',['equipment'=> $equipment])->render();
    return response()->json([$view]);
  }
  public function update(Request $request){
   // dd($request->all());
   $equipment = Equipment::find($request->id);
   $equipment->update($request->all());
   return redirect()->route('admin.equipment.index')->with('success','Equipment Updated Successfully');
  }
  public function delete(Request $request){
    $equipment = Equipment::find($request->id);
    $equipment->delete();
    return response()->json('success');
  }
}
