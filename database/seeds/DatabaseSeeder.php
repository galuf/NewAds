<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);        
        $this->call(UserTableSeeder::class);
        $this->call(RegionSeeder::class);
        $this->call(ProvinciaTableSeeder::class);
        $this->call(DistritoTableSeeder::class);
        $this->call(CategoriaTableSeeder::class);
    }
}
