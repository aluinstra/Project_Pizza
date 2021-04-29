<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Pizza;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tableHeads = array("id", "Naam", "Ordered", "Update", "Delete");

        $pizzas = Pizza::get();

        $total = 0;

        // foreach ($ingredients as $key => $ingredient) {
        //     $total += $ingredient->used;
        // }

        return view('pizzas.index', compact('pizzas', 'tableHeads'), ['usedUnits' => $total]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        $ingredients = Ingredient::get();


        return view('pizzas.create', compact('categories', 'ingredients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        $ingredients = $request->ingredient_id;
        // dd($ingredients); moet array moet ingredient_ids zijn

        $pizza = Pizza::create(request()->validate([
            'name' => ['required']
        ]));

        // dd($pizza);

        $pizza->ingredients()->sync($ingredients);

        return redirect()->route('pizzas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Filter by ingredients.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function filterOnIngredient(Request $request)
    {
        // dd($request->ingredientsArray);

        $query = Pizza::with('ingredients');
        foreach ($request->ingredientsArray as $ingredientId) {
            $query->whereHas('ingredients', function ($q) use ($ingredientId) {
                $q->where('ingredients.id', $ingredientId);
            });
        }
        $pizzas = $query->get();

        $ingredientIdArray = $request->ingredientsArray;

        $pizzas = Pizza::whereHas('ingredients', function ($query) use ($ingredientIdArray) {
            /**
             * Now querying the Tags relation. So anything in this closure will query the Tags
             * relation, but outside of the closure, you're back to querying the Articles.
             */
            $query->whereIn('ingredient_id', $ingredientIdArray);
        })->get();

        // dd($pizzas);

        // return response()->json(['pizzas' => $pizzas]);

        // $tableHeads = array("id", "Naam", "Order");


        // $categories = Category::get();

        return view('users.pizzaOverview', compact('pizzas'));
    }
}
