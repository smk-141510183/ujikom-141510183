<?php

use Illuminate\Database\Seeder;
use App\User;
class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
    		'name'=>'ADMIN',
    		'permission'=>'Admin',
    		'email'=>'admin@gmail.com',
    		'password'=> bcrypt('admin12345'),
    		]);
        User::insert([
            'name'=>'USER',
            'permission'=>'User',
            'email'=>'user@gmail.com',
            'password'=> bcrypt('user12345'),
            ]);
        User::insert([
            'name'=>'HRD',
            'permission'=>'Hrd',
            'email'=>'hrd@gmail.com',
            'password'=> bcrypt('hrd12345'),
            ]);
        User::insert([
            'name'=>'Administrasi',
            'permission'=>'Administrasi',
            'email'=>'adm@gmail.com',
            'password'=> bcrypt('adm12345'),
            ]);

    }
}
