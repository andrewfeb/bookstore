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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->char('isbn', 13);
            $table->string('author');
            $table->date('publish_date');
            $table->unsignedInteger('publisher_id');
            $table->unsignedInteger('genre_id');
            $table->string('cover');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('publisher_id')->references('id')->on('publishers');
            $table->foreign('genre_id')->references('id')->on('genres');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};