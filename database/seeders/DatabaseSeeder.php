<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Kitchen;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Test User',
            'email' => 'test@gmail.com',
            'password' => Hash::make('password'),
            'kitchen_id' => 1
        ]);

        Kitchen::create([
            'nome' => 'Test Kitchen',
            'indirizzo' => 'Via Test 1',
            'citta' => 'Test City',
            'cap' => '12345',
            'user_id' => 1
        ]);

        Supplier::create([
            'nome' => 'Test Supplier'
        ]);

        DB::table('categories')->insert([
            [
                'category' => 'carne',
                'sub_category' => 'manzo'
            ],
            [
                'category' => 'carne',
                'sub_category' => 'maiale'
            ],
            [
                'category' => 'carne',
                'sub_category' => 'pollo'
            ],
            [
                'category' => 'carne',
                'sub_category' => 'agnello'
            ],
            [
                'category' => 'carne',
                'sub_category' => 'vitello'
            ],
            [
                'category' => 'carne',
                'sub_category' => 'cacciagione'
            ],
            [
                'category' => 'pesce',
                'sub_category' => 'fresco'
            ],
            [
                'category' => 'pesce',
                'sub_category' => 'crostacei'
            ],
            [
                'category' => 'pesce',
                'sub_category' => 'molluschi'
            ],
            [
                'category' => 'pesce',
                'sub_category' => 'salmone'
            ],
            [
                'category' => 'pesce',
                'sub_category' => 'tonno'
            ],
            [
                'category' => 'latticini',
                'sub_category' => 'latte'
            ],
            [
                'category' => 'latticini',
                'sub_category' => 'formaggi freschi'
            ],
            [
                'category' => 'latticini',
                'sub_category' => 'formaggi stagionati'
            ],
            [
                'category' => 'latticini',
                'sub_category' => 'yogurt'
            ],
            [
                'category' => 'latticini',
                'sub_category' => 'burro'
            ],
            [
                'category' => 'frutta e verdura',
                'sub_category' => 'frutta fresca'
            ],
            [
                'category' => 'frutta e verdura',
                'sub_category' => 'verdura a foglia'
            ],
            [
                'category' => 'frutta e verdura',
                'sub_category' => 'verdutra radicale'
            ],
            [
                'category' => 'frutta e verdura',
                'sub_category' => 'frutta secca'
            ],
            [
                'category' => 'frutta e verdura',
                'sub_category' => 'ortaggi esotice'
            ]
        ]);

        Product::factory(50)->create();
         
    }
}
