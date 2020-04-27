<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('nombre','user')->first();
        $role_admin = Role::where('nombre','admin')->first();

        $user = new User();
        $user->nombre = 'administrador';
        $user->apellido = 'admin';
        $user->email = 'alex@alex.com';
        $user->password = bcrypt('admin');
        $user->telefono = '969641703';
        $user->region = 'Puno';
        $user->provincia = 'Puno';
        $user->distrito = 'Puno';
        $user->direccion = 'Av. Floral #611';
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->nombre = 'usuario';
        $user->apellido = 'user';
        $user->email = 'user@user.com';
        $user->password = bcrypt('user');
        $user->telefono = '969641703';
        $user->region = 'Puno';
        $user->provincia = 'Puno';
        $user->distrito = 'Puno';
        $user->direccion = 'Av. Floral #611';
        $user->save();
        $user->roles()->attach($role_user);

    }
}
