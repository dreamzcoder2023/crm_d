<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use App\Models\EquipmentModel;
use App\Models\EquipmentType;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\DB as FacadesDB;
use Yajra\DataTables\DataTables as DataTablesDataTables;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Product::leftjoin('project', 'project.id', '=', 'product.project_id')
                ->leftjoin('users', 'users.id', '=', 'project.user_id')
                ->leftjoin('equipment', 'equipment.id', '=', 'product.equipment_id')
                ->leftjoin('equipment_type', 'equipment_type.id', '=', 'product.equipment_type_id')
                ->leftjoin('equipment_model', 'equipment_model.id', '=', 'product.equipment_model_id')
                ->select(
                    'product.id',
                   
                    'product.kw',
                    'product.total_kw',
                    FacadesDB::raw('ROUND(product.amperage, 2) as amperage'),  // Rounded amperage
                    'product.rec_breaker_size',
                    'users.name as customer_name',
                    'equipment.name as equipment',
                    'equipment_type.name as type',
                    'equipment_model.name as model',
                    'project.name as project_name'
                )->orderby('id', 'desc');

                return DataTablesDataTables::of($data)
                ->filterColumn('project_name', function($query, $keyword) {
                    $query->where('project.name', 'LIKE', "%{$keyword}%");
                })
                ->filterColumn('customer_name', function($query, $keyword) {
                    $query->where('users.name', 'LIKE', "%{$keyword}%");
                })
                ->filterColumn('equipment', function($query, $keyword) {
                    $query->where('equipment.name', 'LIKE', "%{$keyword}%");
                })
                ->filterColumn('type', function($query, $keyword) {
                    $query->where('equipment_type.name', 'LIKE', "%{$keyword}%");
                })
                ->filterColumn('model', function($query, $keyword) {
                    $query->where('equipment_model.name', 'LIKE', "%{$keyword}%");
                })
                ->addIndexColumn()
                ->make(true);
    
        }


        return view('admin.product.index');
    }
    public function create(Request $request)
    {
        $project = Project::all();
        $equipment = Equipment::all();
        $type = EquipmentType::all();
        return view('admin.product.create', ['project' => $project, 'equipment' => $equipment, 'type' => $type]);
    }
    public function customer_details(Request $request)
    {
        $id = $request->id;

        $customer = User::where('id', $id)->first();
        // dd($customer);
        return response()->json($customer);
    }
    public function model_details(Request $request)
    {
        $id = $request->id;
        $model =  EquipmentModel::where('equipment_type_id', $id)->get();
        return response()->json($model);
    }
    public function kw_details(Request $request)
    {
        $id = $request->id;
        $type_arr = ['simplex' => 1, 'duplex' => 2, 'triplex' => 3, 'quadra' => 4];
        $breaker_arr = [
            "0.63-1" => 1,
            "1.6-2.5" => 2.5,
            "2.5-4" => 4,
            "5.5-8" => 8,
            "6-12" => 12,
            "7-10" => 10,
            "9-16" => 16,
            "16-24" => 24,
            "17-25" => 25,
            "23-32" => 32,
            "30-40" => 40,
            "37-50" => 50,
            "48-65" => 65,
            "55-70" => 70,
            "63-80" => 80,
            "80-104" => 104,
            "93-120" => 120,
            "150-250" => 250,
            "300-400" => 400,
            "500-630" => 630
        ];
        $type = EquipmentType::where('id', $request?->type_id)?->first()?->name;
        // dd($request->type_id);
        // dd($id);
        $model = EquipmentModel::where('id', $id)->first();
        // dd($model);
        $type_name_low = $type ? strtolower($type) : null;
        $type_name = $type_arr[$type_name_low] ?? null;
        // dd($type_name);
        $total_kw = $model->power_kw * $type_name;
        $amperage = Round((($total_kw * 1000) / (380 * 0.94 * 1.73) * 2),2);
        $breaker_size = $this->getNextBreakerSize($amperage, $breaker_arr);
        // dd($breaker_size);
        $response = [
            'model' => $model->name,
            'kw' => $model->power_kw,
            'total_kw' => $total_kw,
            'amerage' => $amperage,
            'breaker_size' => $breaker_size,
        ];
        return response()->json($response);
    }
    // public function getNextBreakerSize($amperage, $breaker_sizes) {
    //     // Sort the sizes in ascending order to make sure we get the next larger size
    //     $sizes = [];
    //     foreach ($breaker_sizes as $range => $size) {
    //         list($min, $max) = explode('-', $range);
    //         if ($amperage >= (float)$min && $amperage <= (float)$max) {
    //             $sizes[] = $size;
    //         }
    //     }

    //     // Check if $sizes has any elements
    //     if (empty($sizes)) {
    //         return null; // Return null if no matching sizes are found
    //     }

    //     // Sort the matched sizes and get the maximum size
    //     sort($sizes);
    //     $maxSize = max($sizes);

    //     // Find and return the smallest breaker size greater than $maxSize
    //     foreach ($breaker_sizes as $range => $size) {
    //         if ($size > $maxSize) {
    //             return $size;
    //         }
    //     }

    //     return null; // Return null if no next size is found
    // }
    // public function getNextBreakerSize($amperage, $breaker_sizes) {
    //     // Store all matched sizes
    //     $sizes = [];

    //     // Loop through each range to find matching sizes
    //     foreach ($breaker_sizes as $range => $size) {
    //         list($min, $max) = explode('-', $range);

    //         // Check if amperage is within the range
    //         if ($amperage >= (float)$min && $amperage <= (float)$max) {
    //             $sizes[] = $size;
    //         }
    //     }

    //     // If matched sizes are found, return the smallest matched size
    //     if (!empty($sizes)) {
    //         sort($sizes);
    //         return $sizes[0];
    //     }

    //     // If no match is found, find the next larger size
    //     foreach ($breaker_sizes as $range => $size) {
    //         list($min, ) = explode('-', $range);

    //         // Return the first size where min range is greater than amperage
    //         if ((float)$min > $amperage) {
    //             return $size;
    //         }
    //     }

    //     // If amperage is larger than any range, return the largest available size
    //     return end($breaker_sizes);
    // }
    public function getNextBreakerSize($amperage, $breaker_sizes)
    {
        $sizes = [];

        // Loop through each range to find all sizes that include the amperage
        foreach ($breaker_sizes as $range => $size) {
            list($min, $max) = explode('-', $range);

            // Check if amperage falls within the range
            if ($amperage >= (float)$min && $amperage <= (float)$max) {
                $sizes[] = $size;
            }
        }

        // If there are matching sizes, return the highest size
        if (!empty($sizes)) {
            return max($sizes);
        }

        // If no match is found, find the smallest size greater than amperage
        foreach ($breaker_sizes as $range => $size) {
            list($min,) = explode('-', $range);

            // Return the first size where the min range is greater than amperage
            if ((float)$min > $amperage) {
                return $size;
            }
        }

        // If amperage is larger than any range, return the largest available size
        return end($breaker_sizes);
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $product = Product::create($request->all());
        return redirect()->route('admin.product.index')->with('success', 'Product created successfully');
    }
}
