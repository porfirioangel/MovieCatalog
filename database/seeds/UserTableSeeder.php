<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => 1,
            'name' => 'Porfirio Ángel',
            'lastname' => 'Díaz Sánchez',
            'email' => 'porfirioads@gmail.com',
            'password' => 'e516f979536994a14d9b0500bca3a1287b9ea9fe'
        ]);

        User::create([
            'id' => 2,
            'name' => 'Miguel',
            'lastname' => 'Pérez',
            'email' => 'miguel@gmail.com',
            'password' => 'e516f979536994a14d9b0500bca3a1287b9ea9fe'
        ]);
    }
}
