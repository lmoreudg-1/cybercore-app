<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('threats', function (Blueprint $table) {
            $table->id();
            $table->string('alias'); // Nombre clave 
            $table->string('type');  // Categoría (Ransomware, APT, Zero-day)
            $table->string('risk_level'); // Crítico, Alto, Medio, Bajo
            $table->text('description');  // Explicación técnica del ataque
            $table->string('cloud_link'); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('threats');
    }
};
