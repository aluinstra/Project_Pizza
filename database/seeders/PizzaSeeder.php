<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Pizza;


class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pizza = Pizza::create(['name' => "Margherita"]);
        $pizza->ingredients()->sync([1, 4, 6]);

        $pizza = Pizza::create(['name' => "Funghi"]);
        $pizza->ingredients()->sync([10]);

        $pizza = Pizza::create(['name' => "Hawaii"]);
        $pizza->ingredients()->sync([1, 4, 3, 11]);

        $pizza = Pizza::create(['name' => "Salami"]);
        $pizza->ingredients()->sync([2]);

        $pizza = Pizza::create(['name' => "Campanera"]);
        $pizza->ingredients()->sync([3, 6, 10, 8]);

        $pizza = Pizza::create(['name' => "Carbonara"]);
        $pizza->ingredients()->sync([2, 3, 4, 8]);

        $pizza = Pizza::create(['name' => "Americana"]);
        $pizza->ingredients()->sync([19, 4, 10, 7, 8]);
    }
}
