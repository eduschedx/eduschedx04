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
    Schema::create('subjects', function (Blueprint $table)
    {
        $table->id();

        $table->string('subject_code')->unique();

        $table->string('subject_title');

        $table->integer('lec_hours');

        $table->integer('lab_hours')
              ->default(0);

        $table->integer('units');

        $table->integer('year_level');

        $table->integer('semester');

        $table->string('prerequisite')
              ->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
