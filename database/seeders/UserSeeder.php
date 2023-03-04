<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            'name' => 'test1',
            'gender' => 1,
            'age' => '10',
            'tel' => '090-9999-9999',
            'email' => 'test1@test.jp',
            'address' => 'osaka',
            'password' => Hash::make('test1test1'),
            'created_at' => '2022/1/1',
            ],
            
            [
                'name' => 'test2',
                'gender' => 1,
                'age' => '10',
                'tel' => '090-9999-9999',    
                'email' => 'test2@test.jp',
                'address' => 'osaka',
                'password' => Hash::make('test2test2'),
                'created_at' => '2022/1/1',
            ],

            [
                'name' => 'test3',
                'gender' => 1,
                'age' => '10',
                'tel' => '090-9999-9999',    
                'email' => 'test3@test.jp',
                'address' => 'osaka',
                'password' => Hash::make('test3test3'),
                'created_at' => '2022/1/1',
            ]
        ]);
    }
}
