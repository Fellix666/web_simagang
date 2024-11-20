<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class DatabaseSeeder extends Seeder
{
    public function run()
    { // Membuat admin default
        Admin::create(['username' => 'admin', 'password' => Hash::make('admin123')]);
    }
}
