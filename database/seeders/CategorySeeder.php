<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Category;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['vlees', 'groente', 'fruit', 'kaas', 'zeevruchten', 'grondstoffen'];

        foreach ($categories as $categorie) {
            Category::create(['category' => $categorie]);
        }
    }
}
