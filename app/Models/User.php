<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use HasFactory, Notifiable, HasRoles;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $guarded = ['id'];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * Get the attributes that should be cast.
   *
   * @return array<string, string>
   */
  protected function casts(): array
  {
    return [
      'email_verified_at' => 'datetime',
      'password' => 'hashed',
    ];
  }



  // laravel role and permission spatie permission


  /**
   * get permission by group
   */
  public static function getpermissionGroups()
  {
    $getpermission_groups = DB::table('permissions')->select('group_name')->groupBy('group_name')->get();
    return $getpermission_groups;
  } // End Method 

  /**
   * get permission by group name
   */

  public static function getpermissionbyGroupsName($group_name)
  {
    $permissions = DB::table('permissions')->select('id', 'name')->where('group_name', $group_name)->get();
    return $permissions;
  } // End Method 

  /**
   * role has permission permission by group/name
   */
  public static function roleHasPermissions($role, $permissions)
  {
    $hasPermission = true;
    foreach ($permissions as $permission) {
      if (!$role->hasPermissionTo($permission->name)) {
        $hasPermission = false;
        return $hasPermission;
      }
      return $hasPermission;
    }
  } // End Method 
}
