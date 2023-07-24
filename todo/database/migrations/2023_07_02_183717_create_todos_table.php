<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->string('notes', 300);
            $table->boolean('complete')->default(false);
            $table->date('start')->default(now());
            $table->date('end')->nullable();
            $table->time('duetime')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('todos');
    }
};
