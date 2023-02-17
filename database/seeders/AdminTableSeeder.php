<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminData = [
            [
                'name' => 'admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin002'),
                'gender' => 'male',
                'role' => 'super_admin',
                'is_active' => true,
            ],
            [
                'name' => 'ram',
                'username' => 'ram',
                'email' => 'ram@gmail.com',
                'password' => bcrypt('ram002'),
                'gender' => 'male',
                'role' => 'admin',
                'is_active' => true,
            ]
        ];

        foreach ($adminData as $admin) {
            Admin::create($admin);
        }
    }
}
