<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
  use HasFactory;
  protected $guarded=['id'];

  /**
   *relation with subcategory 
   */
  public function users()
  {
    return $this->belongsTo(User::class, 'user_id', 'id');
  }

  /**
   *relation with subcategory 
   */
  public function categories()
  {
    return $this->belongsTo(Category::class, 'category_id', 'id');
  }

  /**
   *relation with subcategory 
   */
  public function subcategories()
  {
    return $this->belongsTo(Subcategory::class, 'subcategory_id', 'id');
  }
}
