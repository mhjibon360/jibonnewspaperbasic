<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
  use HasFactory;
  protected $guarded = ['id'];

  /**
   *relation with subcategory 
   */
  public function categories()
  {
    return $this->belongsTo(Category::class, 'category_id', 'id');
  }
}
