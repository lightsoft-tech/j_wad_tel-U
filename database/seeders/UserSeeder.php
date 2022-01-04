<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'customer']);

        $admin = new \App\Models\User();
        $admin->name = 'Admin Upnormal';
        $admin->email = 'upnormal@admin.com';
        $admin->email_verified_at = now();
        $admin->password = bcrypt('admin123');
        $admin->telepon = '08384662384';
        $admin->avatar = 'avatar.png';
        $admin->remember_token = \Str::random(60);
        $admin->created_at = now();
        $admin->updated_at = now();
        $admin->save();
        $admin->assignRole('admin');

        $customer = new \App\Models\User();
        $customer->name = 'Customer Upnormal';
        $customer->email = 'upnormal@customer.com';
        $customer->email_verified_at = now();
        $customer->password = bcrypt('customer123');
        $customer->telepon = '08384662384';
        $customer->avatar = 'avatar.png';
        $customer->remember_token = \Str::random(60);
        $customer->created_at = now();
        $customer->updated_at = now();
        $customer->save();
        $customer->assignRole('customer');

        /* $admin = new \App\Models\User([
            'name' => 'Admin Upnormal',
            'email' => 'upnormal@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin123'),
            'telepon' => '08384662384',
            'avatar' => 'avatar.png',
            'remember_token' => \Str::random(60),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $admin->assignRole('admin');

        $customer = new \App\Models\User([
            'name' => 'Customer Upnormal',
            'email' => 'upnormal@customer.com',
            'email_verified_at' => now(),
            'password' => bcrypt('customer123'),
            'telepon' => '08384662384',
            'avatar' => 'avatar.png',
            'remember_token' => \Str::random(60),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $customer->assignRole('customer'); */
    }
}
