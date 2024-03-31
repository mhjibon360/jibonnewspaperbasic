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
    Schema::create('newscategories', function (Blueprint $table) {
      $table->id();
      $table->integer('category_one')->nullable();
      $table->integer('category_two')->nullable();
      $table->integer('category_three')->nullable();
      $table->integer('category_four')->nullable();
      $table->integer('category_five')->nullable();
      $table->integer('subcategory_six')->nullable();
      $table->integer('subcategory_seven')->nullable();
      $table->integer('subcategory_eight')->nullable();
      $table->integer('subcategory_nine')->nullable();
      $table->integer('subcategory_ten')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('newscategories');
  }
};
