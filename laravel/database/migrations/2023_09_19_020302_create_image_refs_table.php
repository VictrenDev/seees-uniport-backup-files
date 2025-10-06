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
    {   if(!Schema::hasTable('image_refs')){
            Schema::create('image_refs', function (Blueprint $table) {
                $table->id('ref_id');
                $table->string('ref_type');
                $table->unsignedBigInteger('image_id');
                $table->unsignedBigInteger('article_id');
                $table->timestamps();
                $table->foreign('article_id')->references('article_id')->on('articles')->onDelete('cascade');
                $table->foreign('image_id')->references('image_id')->on('images')->onDelete('cascade');
                $table->unique(['article_id','image_id']);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_refs');
    }
};
