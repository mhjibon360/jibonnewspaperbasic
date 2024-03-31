<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class userTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    // insert some user data admin data
    DB::table('users')->insert([
      // admin data
      [
        'name' => 'Mehedi',
        'email' => 'mjjibon114@gmail.com',
        'username' => 'mehedibd360',
        'password' => Hash::make('mjjibon114@gmail.com'),
        'role' => 'admin',
        'status' => 'active',
        'created_at'=>Carbon::now(),
      ],

      // admin data
      [
        'name' => 'jibon',
        'email' => 'mjjibon113@gmail.com',
        'username' => 'jibonbd360',
        'password' => Hash::make('mjjibon113@gmail.com'),
        'role' => 'admin',
        'status' => 'active',
        'created_at'=>Carbon::now(),
      ],

      // user data
      [
        'name' => 'Hassan',
        'email' => 'mjjibon115@gmail.com',
        'username' => 'hassanbd360',
        'password' => Hash::make('mjjibon115@gmail.com'),
        'role' => 'user',
        'status' => 'active',
        'created_at'=>Carbon::now(),
      ],
      // user data
      [
        'name' => 'Maisa',
        'email' => 'maisa@gmail.com',
        'username' => 'maisabd354',
        'password' => Hash::make('maisa@gmail.com'),
        'role' => 'user',
        'status' => 'active',
        'created_at'=>Carbon::now(),
      ],
    ]);
  }
}
