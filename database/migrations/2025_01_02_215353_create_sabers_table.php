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
        Schema::create('saberes', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descripcion');
            $table->foreignId('area_tematica_id')->constrained('area_tematicas')->nullOnDelete();
            $table->foreignId("media_id")->nullable()->constrained('media')->nullOnDelete();
            $table->foreignId('format_id')->constrained('formats')->nullOnDelete();
            $table->json('palabras_clave');
            $table->string('autor');
            $table->string('enlace_adicional')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sabers');
    }
};
