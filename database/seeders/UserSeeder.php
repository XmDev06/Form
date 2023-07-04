<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $current_time = Carbon::now();
        DB::table('users')->insert([
            [
                'name' => 'Adminstrator',
                'email' => 'admin@admin.com',
                'email_verified_at' => $current_time,
                'password' => bcrypt('password'),
                'created_at' => $current_time,
                'updated_at' => $current_time,
                'admin'=>1
            ]
        ]);
    }
}
