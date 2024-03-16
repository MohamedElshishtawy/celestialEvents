<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Event;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $permission = Permission::create([
            'name' => 'Admin',
            'description' => 'All Access'
        ]);

        $user = User::create([
            'name' => "Mohamed",
            'permissions_id' => $permission->id, // Assign the ID of the permission
            'email' => 'medo@m.com',
            'password' => bcrypt('123') // Hash the password
        ]);

        $category = Category::create([
            'name' => 'moon',
            'description' => 'All about the moon'
        ]);

        Event::create([
            'name' => 'loner eclipse',
            'date' => '2003/11/02 11:23:00',
            'categories_id' => $category->id // Assign the ID of the category
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
