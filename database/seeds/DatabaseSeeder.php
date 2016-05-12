<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'Admin',
                'email' => 'admin@keyman.com',
                'phone_num' => '09112223333',
                'password' => bcrypt('password'),
                'is_admin' => true,
            ]
        );
        DB::table('insurance_types')->insert([
            ['name' => 'Life'],
            ['name' => 'Health'],
            ['name' => 'Motor'],
            ['name' => 'Travel'],
        ]);
        DB::table('request_types')->insert([
            [
                'name' => 'Addition',
                'ideal_turnaround' => 3,
            ],
            [
                'name' => 'Cancellation',
                'ideal_turnaround' => 5,
            ],
        ]);
    }
}
