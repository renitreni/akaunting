<?php

namespace Database\Seeders;

use App\Models\AssigedGLAccount;
use App\Models\AssignedCategory;
use App\Models\ChartOfAccount;
use App\Models\GLAccount;
use App\Models\GLCategory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name'              => 'Administrator',
            'email'             => 'admin@site.com',
            'email_verified_at'  => now(),
            'password'          => Hash::make('info1234'),
            'remember_token'    => Str::random(10),
        ]);

        User::factory(10)->create();

        $this->call(PermissionsTableSeeder::class);
        $this->call(ConnectRelationshipsSeeder::class);

        GLAccount::factory(20)->create();
        GLCategory::factory(20)->create();
        ChartOfAccount::factory(20)->create();
        AssigedGLAccount::factory(100)->create();
        AssignedCategory::factory(100)->create();
    }
}
