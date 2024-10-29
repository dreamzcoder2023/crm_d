<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EquipmentType;
use App\Models\EquipmentModel;
use Illuminate\Http\Request;
use DataTables;
use Yajra\DataTables\DataTables as DataTablesDataTables;

class EquipmentModelController extends Controller
{
    public function index(Request $request){
        // $equipments = Equipment::all();
        // return view('admin.equipment.index',['equipments' => $equipments]);
        if ($request->ajax()) {

            $data = EquipmentModel::leftjoin('equipment_type','equipment_type.id','=','equipment_model.equipment_type_id')->select('equipment_model.*','equipment_type.name as type')->orderby('id','desc');

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
        $equipment_type = EquipmentType::latest()->get();
        return view('admin.equipmentmodel.index',['equipment_type' => $equipment_type]);
    }
  public function store(Request $request){
    $input = $request->all();
   // dd($input);
    EquipmentModel::create($input);
    return redirect()->route('admin.equipmentmodel.index')->with('success','Equipment Model Created Successfully');
  }
  public function edit(Request $request){
    $equipment = EquipmentType::all();
    $equipment_model = EquipmentModel::find($request->id);
    $view = View('admin.equipmentmodel.edit',['equipment'=> $equipment,'equipment_model' => $equipment_model])->render();
    return response()->json([$view]);
  }
  public function update(Request $request){
   // dd($request->all());
   $equipment = EquipmentModel::find($request->id);
   $equipment->update($request->all());
   return redirect()->route('admin.equipmentmodel.index')->with('success','Equipment Model Updated Successfully');
  }
  public function delete(Request $request){
    $equipment = EquipmentModel::find($request->id);
    $equipment->delete();
    return response()->json('success');
  }
}
