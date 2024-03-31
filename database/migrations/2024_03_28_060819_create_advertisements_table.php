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
    Schema::create('advertisements', function (Blueprint $table) {
      $table->id();
      $table->string('one')->nullable();
      $table->string('two')->nullable();
      $table->string('three')->nullable();
      $table->string('four')->nullable();
      $table->string('five')->nullable();
      $table->string('six')->nullable();
      $table->string('sevent')->nullable();
      $table->string('eight')->nullable();
      $table->string('nine')->nullable();
      $table->string('ten')->nullable();
      $table->string('elevent')->nullable();
      $table->string('twelve')->nullable();
      $table->string('thirteen')->nullable();
      $table->string('fourteeen')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('advertisements');
  }
};
