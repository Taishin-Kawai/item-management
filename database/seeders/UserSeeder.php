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
            'name' => 'shiro',
            'gender' => 1,
            'age' => '10',
            'tel' => '090-9999-9999',
            'email' => 'shiro@test.jp',
            'address' => 'osaka',
            'password' => Hash::make('shiroshiro'),
            'created_at' => '2022/1/1',

            ],
            [
                'name' => 'taro',
                'gender' => 1,
                'age' => '10',
                'tel' => '090-9999-9999',    
                'email' => 'taro@test.jp',
                'address' => 'osaka',
                'password' => Hash::make('tarotaro'),
                'created_at' => '2022/1/1',

            ],
            [
                'name' => 'jiro',
                'gender' => 1,
                'age' => '10',
                'tel' => '090-9999-9999',    
                'email' => 'jiro@test.jp',
                'address' => 'osaka',
                'password' => Hash::make('jirojiro'),
                'created_at' => '2022/1/1',

            ]
        ]);
    }
}
