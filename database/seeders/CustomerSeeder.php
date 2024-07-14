<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::create([
            'name' => 'wade',
            'surname' => 'wade',
            'dni' => 'wade',
            'ruc' => 'awade',
            'customer_type_id' => 1,
            'reason' => '',
            'address' => '',
            'email' => 'awedasd@gmail.com',
            'phone' => '1234566789'
        ]);
    }
}
