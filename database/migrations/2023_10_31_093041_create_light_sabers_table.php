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
        Schema::create('light_sabers', function (Blueprint $table) {
            $table->id();
            $table->string('cover_image')->nullable();
            $table->string('name', 50);
            $table->text('description')->nullable();
            $table->decimal('price', 5, 2)->nullable();
            $table->boolean('is_available')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('light_sabers');
    }
};
