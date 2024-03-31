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
    Schema::create('subcategories', function (Blueprint $table) {
      $table->id();
      $table->foreignId('category_id')->constrained()->onDelete('cascade');
      $table->string('subcategory_name_en')->nullable();
      $table->string('subcategory_slug_en')->nullable();
      $table->string('subcategory_name_bn')->nullable();
      $table->string('subcategory_slug_bn')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('subcategories');
  }
};
