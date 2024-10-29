<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables as DataTablesDataTables;

class ProjectController extends Controller
{
  public function index(Request $request) {
    $cableSizes = [
        '4' => 1.5,
        '8' => 2.5,
        '28' => 4,
        '36' => 6,
        '50' => 10,
        '68' => 16,
        '89' => 25,
        '110' => 35,
        '134' => 50,
        '171' => 70,
        '207' => 95,
        '239' => 120,
        '262' => 150,
        '296' => 185,
        '346' => 240,
        '394' => 300,
        '467' => 400,
        '533' => 500,
        '611' => 630
    ];

    if ($request->ajax()) {
        $data = Project::leftJoin('users', 'users.id', '=', 'project.user_id')
            ->select('project.*', 'users.name as customer_name')
            ->orderBy('id', 'desc');

        return DataTablesDataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                $btn = '<a href="javascript:void(0)" class="edit_model" data-id="' . $row->id . '"><i class="feather feather-edit-3 me-3"></i></a>
                        <a href="javascript:void(0)" class="delete_model" data-id="' . $row->id . '"><i class="feather feather-trash-2 me-3"></i></a>';
                return $btn;
            })
            ->addColumn('total_kw', function($row) {
                return Product::where('project_id', $row->id)->sum('total_kw');
            })
            ->addColumn('total_amperage', function($row) {
                return Product::where('project_id', $row->id)->sum('amperage');
            })
            ->addColumn('main_cable', function($row) {
                // Calculate main cable as the sum of amperage
                $amperage = Product::where('project_id', $row->id)->sum('amperage');
                return $amperage;
            })
            ->addColumn('recommand', function($row) use ($cableSizes) {
                // Get total amperage for the project
                $amperage = Product::where('project_id', $row->id)->sum('amperage');
                
                // Find the recommended cable size based on amperage
                $recommendedCableSize = 0;
                if($amperage > 0){
                
                foreach ($cableSizes as $amp => $size) {
                    if ($amperage <= $amp) {
                        $recommendedCableSize = $size;
                        break;
                    }
                }
                
              }

                return  $recommendedCableSize ?: 0;  // Return 'N/A' if no size found
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    $users = User::latest()->get();
    return view('admin.project.index', ['users' => $users]);
}
    public function store(Request $request){
        $input = $request->all();
       // dd($input);
        Project::create($input);
        return redirect()->route('admin.project.index')->with('success','Project Created Successfully');
      }
      public function edit(Request $request){
        $users = User::all();
        $project = Project::find($request->id);
        $view = View('admin.project.edit',['users'=> $users,'project' => $project])->render();
        return response()->json([$view]);
      }
      public function update(Request $request){
       // dd($request->all());
       $project = Project::find($request->id);
       $project->update($request->all());
       return redirect()->route('admin.project.index')->with('success','Project Updated Successfully');
      }
      public function delete(Request $request){
        $project = Project::find($request->id);
        $project->delete();
        return response()->json('success');
      }
}
