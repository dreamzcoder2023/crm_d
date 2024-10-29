<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EquipmentModel extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $table ="equipment_model";
    protected $fillable = [
        'name','equipment_type_id','power_kw'
    ];
}
