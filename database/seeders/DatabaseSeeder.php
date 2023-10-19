<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Rent;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //SEEDER FOR USER
        User::create([
            "name" => "userAdmin",
            "role" => "admin",
            "email" => "admin@test.com",
            "password" => bcrypt("password")
        ]);

        User::create([
            "name" => "manager1",
            "role" => "pool_manager",
            "email" => "manager1@test.com",
            "password" => bcrypt("password")
        ]);

        User::create([
            "name" => "manager2",
            "role" => "pool_manager",
            "email" => "manager2@test.com",
            "password" => bcrypt("password")
        ]);

        User::create([
            "name" => "driver",
            "role" => "driver",
            "email" => "driver@test.com",
            "password" => bcrypt("password")
        ]);

        //SEEDER FOR VEHICLE
        Vehicle::create([
            "name" => "people 1",
            "type" => "people_transport",
            "status" => "available",
            "owner" => "company"
        ]);

        Vehicle::create([
            "name" => "people 2",
            "type" => "people_transport",
            "status" => "available",
            "owner" => "rent"
        ]);

        Vehicle::create([
            "name" => "mining 1",
            "type" => "mining_transport",
            "status" => "available",
            "owner" => "company"
        ]);

        Vehicle::create([
            "name" => "mining 2",
            "type" => "mining_transport",
            "status" => "available",
            "owner" => "rent"
        ]);

        //SEEDER FOR RENT
    }
}
