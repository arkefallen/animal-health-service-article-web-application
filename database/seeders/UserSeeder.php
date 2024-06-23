<?php

namespace Database\Seeders;

use Carbon\CarbonTimeZone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin Puskeswan',
            'email' => 'admin-puskeswan@ta-swe-puskeswan.web.id',
            'password' => Hash::make('admin#123'),
            'created_at' => Carbon::now(new CarbonTimeZone(7)),
            'updated_at' => Carbon::now(new CarbonTimeZone(7)),
        ]);
    }
}
