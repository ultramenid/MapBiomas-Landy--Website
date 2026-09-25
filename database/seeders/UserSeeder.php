<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed a known CMS admin account so the login is never lost.
     * Idempotent: re-running updates the existing row instead of duplicating it.
     */
    public function run(): void
    {
        if (app()->environment('production')) {
            return;
        }

        $email = 'alichamdan@auriga.or.id';
        $password = env('CMS_ADMIN_PASSWORD', 'admin123');
        $data = [
            'name' => 'ali',
            'password' => Hash::make($password),
            'role_id' => 0,
        ];

        if (DB::table('users')->where('email', $email)->exists()) {
            DB::table('users')->where('email', $email)->update($data);
        } else {
            DB::table('users')->insert($data + ['email' => $email]);
        }
    }
}