<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Department::create([
            'name' => 'Test Department',
        ]);
        \App\Models\LeaveType::create([
            'name' => 'sick leave'
        ]);
        \App\Models\Employee::create([
            'name' => 'Test employee',
            'email' => 'emp@website.com',
            'department_id' => '1',
            'password' => \Hash::make('password'),
        ]);
        \App\Models\Admin::create([
            'name' => 'Test Admin',
            'email' => 'admin@website.com',
            'password' => \Hash::make('password'),
        ]);
    }
}
