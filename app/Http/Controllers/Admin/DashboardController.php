<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use App\Models\EquipmentModel;
use App\Models\EquipmentType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function privateDashboard()
    {
        $user = Auth::user();
        $user_count = User::latest()->count();
        $equipment_count = Equipment::latest()->count();
        $equi_type_count = EquipmentType::latest()->count();
        $equi_model_count = EquipmentModel::latest()->count();
        return view('admin.dashboard', ['user' => $user,'user_count' => $user_count,'equipment_count' => $equipment_count,'equi_type_count' => $equi_type_count,'equi_model_count' => $equi_model_count]);
    }
}
