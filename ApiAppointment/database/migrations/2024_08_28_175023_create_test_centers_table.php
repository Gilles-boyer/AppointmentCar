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
        Schema::create('test_centers', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('start_time_am');
            $table->time('end_time_am');
            $table->time('start_time_pm')->nullable();
            $table->time('end_time_pm')->nullable();
            $table->integer('default_duration');
            $table->string('banner_image')->nullable();
            $table->string('logo_image');
            $table->foreignId('dealership_id')->constrained('dealerships')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_centers');
    }
};
