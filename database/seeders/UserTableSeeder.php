<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
 use App\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() { 
        $role_user = Role::where('name', 'user')->first(); 
        $role_admin = Role::where('name', 'admin')->first();
        $user = new User(); 
        $user->id_vendedor='1';
        $user->name = 'luis'; 
        $user->email = 'luismartinez@gmail.com';
         $user->password = bcrypt('sdfg');
         $user->avatar='default.png';
         
         $user->save(); $user->roles()->attach($role_user);

         $role_admin = Role::where('name', 'admin')->first();
         $user = new User(); 
         $user->id_vendedor='2';
         $user->name = 'Ana'; 
         $user->email = 'anatorres@gmail.com';
         $user->password = bcrypt('1234');
         $user->avatar='default.png';
          
          $user->save(); $user->roles()->attach($role_user);
        
        }
}

