<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->integer('cust_id');
            $table->integer('equipment_id');
            $table->integer('equipment_type_id');
            $table->integer('equipment_model_id');
            $table->integer('kw');
            $table->float('total_kw');
            $table->string('amperage');
            $table->string('rec_breaker_size');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
