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
    Schema::create('videogalleries', function (Blueprint $table) {
      $table->id();
      $table->string('title_en')->nullable();
      $table->string('title_bn')->nullable();
      $table->mediumText('link')->nullable();
      $table->string('image')->nullable();
      $table->integer('status')->default(1);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('videogalleries');
  }
};
