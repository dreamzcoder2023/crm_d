<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table ="product";
    protected $fillable = [
        'project_id',
        'user_id',
        'equipment_id',
        'equipment_type_id','equipment_model_id','kw','total_kw','amperage','rec_breaker_size'

    ];
}
