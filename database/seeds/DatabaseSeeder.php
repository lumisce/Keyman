<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );
        DB::table('insurance_types')->insert([
            [
                'name' => 'Life',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Health',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Motor',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Travel',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            

        ]);
        DB::table('request_types')->insert([
            [
                'name' => 'Addition',
                'ideal_turnaround' => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Cancellation',
                'ideal_turnaround' => 5,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
        DB::table('providers')->insert([
            [
                'name' => 'Provider A',
                'location' => 'Makati City',
                'email' => 'provider_a@email.com',
                'phone_num' => '09345283034',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Provider B',
                'location' => 'Marikina City',
                'email' => 'provider_b@email.com',
                'phone_num' => '09065205834',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
        DB::table('insurances')->insert([
            [
                'name' => 'A Health 1000',
                'insurance_type_id' => 2,
                'provider_id' => 1,
                'payment' => 1000.00,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'A Travel 500',
                'insurance_type_id' => 4,
                'provider_id' => 1,
                'payment' => 500.00,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'B Health 800',
                'insurance_type_id' => 2,
                'provider_id' => 2,
                'payment' => 800.00,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'B Life 500',
                'insurance_type_id' => 1,
                'provider_id' => 2,
                'payment' => 500.00,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
        DB::table('customers')->insert([
            [
                'first_name' => 'Candy',
                'last_name' => 'Park',
                'middle_name' => '',
                'email' => 'candy@email.com',
                'phone_num' => '09345283034',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'first_name' => 'Irene',
                'last_name' => 'Bermejo',
                'middle_name' => 'Yuson',
                'email' => 'irene@email.com',
                'phone_num' => '09065205834',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
        DB::table('customer_insurances')->insert([
            [
                'insurance_id' => 1,
                'customer_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'valid_until' => Carbon::now()->addYear(1)->format('Y-m-d H:i:s'),
            ],
            [
                'insurance_id' => 3,
                'customer_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'valid_until' => Carbon::now()->addYear(1)->format('Y-m-d H:i:s'),
            ],
            [
                'insurance_id' => 2,
                'customer_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'valid_until' => Carbon::now()->addYear(1)->format('Y-m-d H:i:s'),
            ],
            [
                'insurance_id' => 3,
                'customer_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'valid_until' => Carbon::now()->addYear(1)->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
