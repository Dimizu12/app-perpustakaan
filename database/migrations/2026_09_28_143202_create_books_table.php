<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200);
            $table->string('writer', 100);
            $table->string('publisher', 100);
            $table->year('publication_year');
            $table->string('isbn', 20)->unique()->nullable();
            $table->integer('stock')->default(1);
            $table->foreignId('category_id')->constrained('categories');
            $table->string('cover')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
