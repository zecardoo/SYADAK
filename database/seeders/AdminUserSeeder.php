<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Hash;


class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@hotmail.com',
            'password' => Hash::make('admin'),
            'role' => 'admin'
        ]);

          // Create a new cart associated with the user
          $user->carts()->create([
            // Other cart-related fields
        ]);

        $user->orders()->create([
            // Other cart-related fields
        ]);
    }
}