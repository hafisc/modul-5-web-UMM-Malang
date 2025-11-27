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
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->text('description')->nullable();
            $table->enum('category', ['facial', 'body_treatment', 'hair_care', 'nail_care', 'makeup']);
            $table->decimal('price', 10, 2);
            $table->integer('duration'); // in minutes
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->tinyInteger('popularity')->nullable(); // 1-5 rating
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treatments');
    }
};
