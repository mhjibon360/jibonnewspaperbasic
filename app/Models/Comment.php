<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  use HasFactory;
  protected $guarded = ['id'];

  /**
   * relationship with user table
   * 
   */
  public function users()
  {
    return $this->belongsTo(User::class,'user_id','id');
  }
}
