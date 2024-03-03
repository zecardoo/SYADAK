<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Cart;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            AdminUserSeeder::class,
            // Other seeders...
        ]);
        
        // Create 10 users using the User factory
        $users = User::factory(10)->create();

        // Iterate through each user
        $users->each(function ($user) {
            // Create a new cart associated with the user
            $user->carts()->create([
                // Fill in other cart-related fields here
            ]);

            // Create a new order associated with the user
            $user->orders()->create([
                // Fill in other order-related fields here
            ]);
        });
        
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}