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
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->json('skills');
            // $table->string('skill_title');
            // $table->string('html');
            // $table->string('css');
            // $table->string('bootstrap');
            // $table->string('tailwind');
            // $table->string('javascript');
            // $table->string('skill_title2');
            // $table->string('php');
            // $table->string('laravel');
            // $table->string('skill_title3');
            // $table->string('illustrator');
            // $table->string('photoshop');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
