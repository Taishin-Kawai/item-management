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
            'email' => 'shiro@test.jp',
            'password' => Hash::make('shiroshiro'),
            ],
            [
                'name' => 'taro',
                'email' => 'taro@test.jp',
                'password' => Hash::make('tarotaro'),
            ],
            [
                'name' => 'jiro',
                'email' => 'jiro@test.jp',
                'password' => Hash::make('jirojiro'),
            ]
        ]);
    }
}
