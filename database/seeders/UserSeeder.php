<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('users')->insert([
        //     'name' => 'Niaz A Nayeem',
        //     'email' => 'Niaz A Nayeem',
        //     'dob' => 'Niaz A Nayeem',
        //     'password' => '12345678',
        // ]);
        // User::create([
        //     'name' => 'Niaz A Nayeem',
        //     'type'=> 1,
        //     'email' => 'niaz@gmail.com',
        //     'dob' => '07-11-96',
        //     'password' => Hash::make('12345678'),
        // ]);

        $users = [
            [
               'name'=>'Admin',
               'email'=>'admin@gmail.com',
               'type'=>1,
               'password'=> Hash::make('123456'),
               'dob'=> '2000-01-01',
            ],
            [
               'name'=>'Editor',
               'email'=>'editor@gmail.com',
               'type'=> 2,
               'password'=> Hash::make('123456'),
               'dob'=> '2000-01-01',
            ],
           
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
