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
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->String('title');
            $table->text('content');
            $table->timestamps();
        });

        Schema::create('image', function (Blueprint $table) {
            $table->id();
            $table->String('image');
            $table->text('post_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
        Schema::dropIfExists('image');
    }
};