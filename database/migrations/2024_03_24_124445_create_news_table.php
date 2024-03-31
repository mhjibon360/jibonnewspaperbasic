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
    Schema::create('news', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->constrained()->onDelete('cascade');
      $table->foreignId('category_id')->constrained()->onDelete('cascade');
      $table->integer('subcategory_id')->nullable();
      $table->mediumText('title_en');
      $table->mediumText('slug_en')->nullable();
      $table->mediumText('title_bn');
      $table->mediumText('slug_bn')->nullable();
      $table->string('image');
      $table->longText('details_en');
      $table->longText('details_bn');
      $table->string('tags_en')->nullable();
      $table->string('tags_bn')->nullable();
      $table->date('date')->nullable();
      $table->integer('views')->default('0');
      $table->integer('show_at_breaking')->nullable();
      $table->integer('show_at_slider')->nullable();
      $table->integer('show_at_three')->nullable();
      $table->integer('show_at_nine')->nullable();
      $table->integer('status')->default('1');

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('news');
  }
};
