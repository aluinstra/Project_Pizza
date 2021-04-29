<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use App\Models\Ingredient;


class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = array(

            array('ingredient' => "kip", 'category_id' => Category::where('category', 'vlees')->first()->id, "stock" => 10),
            array('ingredient' => "salami", 'category_id' => Category::where('category', 'vlees')->first()->id, "stock" => 10),
            array('ingredient' => "ham", 'category_id' => Category::where('category', 'vlees')->first()->id, "stock" => 10),
            array('ingredient' => "spek", 'category_id' => Category::where('category', 'vlees')->first()->id, "stock" => 10),

            array('ingredient' => "tomaat", 'category_id' => Category::where('category', 'groente')->first()->id, "stock" => 10),
            array('ingredient' => "asperge", 'category_id' => Category::where('category', 'groente')->first()->id, "stock" => 10),
            array('ingredient' => "paprika", 'category_id' => Category::where('category', 'groente')->first()->id, "stock" => 10),
            array('ingredient' => "ui", 'category_id' => Category::where('category', 'groente')->first()->id, "stock" => 10),
            array('ingredient' => "knoflook", 'category_id' => Category::where('category', 'groente')->first()->id, "stock" => 10),
            array('ingredient' => "champignons", 'category_id' => Category::where('category', 'groente')->first()->id, "stock" => 10),

            array('ingredient' => "ananas", 'category_id' => Category::where('category', 'fruit')->first()->id, "stock" => 10),

            array('ingredient' => "Mozzarella", 'category_id' => Category::where('category', 'kaas')->first()->id, "stock" => 10),
            array('ingredient' => "Parmezaanse kaas", 'category_id' => Category::where('category', 'kaas')->first()->id, "stock" => 10),
            array('ingredient' => "Cheddar", 'category_id' => Category::where('category', 'kaas')->first()->id, "stock" => 10),

            array('ingredient' => "Ansjovis", 'category_id' => Category::where('category', 'zeevruchten')->first()->id, "stock" => 10),
            array('ingredient' => "Inktvisringen", 'category_id' => Category::where('category', 'zeevruchten')->first()->id, "stock" => 10),
            array('ingredient' => "Italiaanse bodem", 'category_id' => Category::where('category', 'grondstoffen')->first()->id, "stock" => 10),
            array('ingredient' => "Amerikaanse bodem", 'category_id' => Category::where('category', 'grondstoffen')->first()->id, "stock" => 10),
            array('ingredient' => "tomatensaus", 'category_id' => Category::where('category', 'grondstoffen')->first()->id, "stock" => 10),
            array('ingredient' => "bascilicum", 'category_id' => Category::where('category', 'grondstoffen')->first()->id, "stock" => 10),
            array('ingredient' => "Olijf olie", 'category_id' => Category::where('category', 'grondstoffen')->first()->id, "stock" => 10),
            array('ingredient' => "zout", 'category_id' => Category::where('category', 'grondstoffen')->first()->id, "stock" => 10),


        );

        DB::table('ingredients')->insert($data);
    }
}
