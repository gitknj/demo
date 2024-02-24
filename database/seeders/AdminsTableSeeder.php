<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $adminRecords=[
            'name' => 'Super Admin',
            'type' => 'superadmin',
            'vendor_id' => 0,
            'mobile' => '999999999',
            'email' => 'admin@admin.com',
            'password' =>'e10adc3949ba59abbe56e057f20f883e',
            'image' => '',
            'status' => 1,
        ];

        Admin::insert($adminRecords);

    }
}
