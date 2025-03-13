<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() { // La creación de datos de roles debe ejecutarse primero 
    $this->call([RoleTableSeeder::class,
    ClienteSeeder::class,
    GuionSeeder::class,
    ProductoSeeder::class,
    VendedorSeeder::class,
    UserTableSeeder::class]
    );
    }
}
