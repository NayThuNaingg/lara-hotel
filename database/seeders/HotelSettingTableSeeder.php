<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hotel_settings')->truncate();
        DB::table('hotel_settings')->insert([
            'id'             => '1',
            'name'           => 'Lara Hotel',
            'email'          => 'larahotel.mm@gmail.com',
            'address'        => 'B(32) Hledan, Yangon.',
            'checkin'        => '12:00 PM',
            'checkout'       => '12:00 PM',
            'online_phone'   => '09448887888',
            'outline_phone'  => '01442803',
            'size_unit'      => 'mm²',
            'occupancy'      => 'peoples',
            'price_unit'     => '$',
            'logo'           => '20230811_003947_64d56733396b3.png',
            'created_at'     => date('Y-m-d H:i:s'),
            'updated_at'     => date('Y-m-d H:i:s')
        ]);
    }
}
