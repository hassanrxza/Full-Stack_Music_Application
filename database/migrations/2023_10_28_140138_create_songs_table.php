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
        Schema::create('songs', function (Blueprint $table)
        {
            $table->string('id')->primary();
            $table->string('name');
            $table->string('file');
            $table->string('cat_id');
            $table->foreign('cat_id')->references('id')->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('album_id');
            $table->foreign('album_id')->references('id')->on('album')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->date('post_date');
            $table->string('description');
            $table->string('artist_id');
            $table->foreign('artist_id')->references('id')->on('artists')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('genre_id');
            $table->foreign('genre_id')->references('id')->on('genre')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('songs');
    }
};
