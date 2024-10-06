<?php

namespace Database\Seeders;

use App\Models\IpAddress;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IpAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ip=new IpAddress();
        $ip->ip='10.0.0.1';
        $ip->banned=0;
        $ip->save();

        $ip=new IpAddress();
        $ip->ip='10.0.0.2';
        $ip->banned=1;
        $ip->save();
    }
}
