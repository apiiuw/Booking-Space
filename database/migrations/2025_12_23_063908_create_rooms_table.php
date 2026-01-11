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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('url'); // rapat, lab-komputer, dll
            $table->string('type'); // Rapat, Laboratorium Komputer, dll
            $table->string('name');
            $table->integer('capacity');
            $table->text('facilities');
            $table->string('borrow_days');
            $table->time('borrow_time_start');
            $table->time('borrow_time_end');
            $table->text('description');
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
