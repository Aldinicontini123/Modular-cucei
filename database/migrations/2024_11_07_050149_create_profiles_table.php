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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('degree_id');
            $table->date('end_studies_date')->nullable();
            $table->string('actual_job')->nullable();
            $table->string('actual_company')->nullable();
            $table->string('time_current_company')->nullable();
            $table->string('first_job')->nullable();
            $table->text('description_first_job');
            $table->json('hardskills')->nullable();
            $table->json('technologies')->nullable();
            $table->json('certifications')->nullable();
            $table->json('softskills')->nullable();
            $table->json('proyects_practicies')->nullable();
            $table->json('extras_cources')->nullable();
            $table->string('council');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
