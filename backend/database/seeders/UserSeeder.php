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
        for ($i = 0; $i < 9; $i++) {
            DB::table("users")->insert([
                "first_name" => Str::random(12),
                "email" => Str::random(8) . "@mail.ru",
                "password" => bcrypt('user'),
            ]);
        }

        DB::table('users')->insert([
            "first_name" => "admin",
            "email" => "admin@mail.ru",
            "is_admin" => true,
            "password" => bcrypt("admin"),
        ]);
    }
}
