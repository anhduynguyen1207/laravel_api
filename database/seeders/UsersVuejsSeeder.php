<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UsersVuejsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table("users_vuejs")->insert([
        //     "username" => "admin",
        //     "name" => "admin",
        //     "email" => "admin@gmail.com",
        //     "password" => Hash::make("admin"),
        //     "department_id" => "1",
        //     "status_id" => "1"

        // ]);
        DB::table("users_vuejs")->insert([
            "username" => "employee1",
            "name" => "employee1",
            "email" => "employee1@gmail.com",
            "password" => Hash::make("123"),
            "department_id" => "1",
            "status_id" => "1"

        ]);
    }
}
