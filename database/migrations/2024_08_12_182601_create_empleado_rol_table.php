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
        Schema::create('empleado_rol', function (Blueprint $table) {
            $table->unsignedBigInteger('empleado_id');
            $table->unsignedBigInteger('rol_id');
        
            // Foreign key definitions
            $table->foreign('empleado_id')->references('id')->on('empleados')->onDelete('cascade');
            $table->foreign('rol_id')->references('id')->on('roles')->onDelete('cascade');
        
            // Composite primary key
            $table->primary(['empleado_id', 'rol_id']);
        
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleado_rol');
    }
};
