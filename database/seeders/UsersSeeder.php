<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate(['email'=>'test001@example.com'],
        [
            'name' => 'Syed Shazeedul',
            'email' => 'syedshazeedul@gmail.com',
            'password' => bcrypt('123456789'),
            'role' => '1',
        ]);
        
        User::firstOrCreate(['email'=>'test002@example.com'],
        [
            'name' => 'Mr. Nejam',
            'email' => 'syedshazeedul@yahoo.com',
            'password' => bcrypt('987654321'),
            'role' => '0',
        ]);

        User::firstOrCreate(['email'=>'test003@example.com'],
        [
            'name' => 'Mr. Daud',
            'email' => 'syedshazeedul@hotmail.com',
            'password' => bcrypt('987654321'),
            'role' => '0',
        ]);
        
    }
}
