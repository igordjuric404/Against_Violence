<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=new User();
        $user->name='admin';
        $user->password=Hash::make('admin');
        $user->access_level='admin';
        $user->save();

        $user=new User();
        $user->name='user1';
        $user->password=Hash::make('user1');
        $user->save();

        $user=new User();
        $user->name='user2';
        $user->password=Hash::make('user2');
        $user->save();
    }
}
