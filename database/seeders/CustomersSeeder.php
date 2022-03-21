<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customers;
use Faker\Factory as Faker;
class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i=1;$i<=100;$i++){
        $customer= new Customers();
        $customer->name=$faker->name;
        $customer->email=$faker->email;
        $customer->gender='M';
        $customer->address=$faker->address;
        $customer->state= $faker->state;
        $customer->country = $faker->country;
        $customer->password=$faker->password;
        $customer->dob=$faker->date();
        $customer->save();
        }
    }
}
