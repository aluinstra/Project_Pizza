<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tableHeads = array("id", "Ingredient", "Category", "last_order", "Stock", "Used", "Update", "Delete");

        $ingredients = Ingredient::get();

        $total = 0;

        foreach ($ingredients as $key => $ingredient) {
            $total += $ingredient->used;
        }

        return view('ingredients.index', compact('ingredients', 'tableHeads'), ['usedUnits' => $total]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();

        return view('ingredients.create', compact('categories'));
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

        Ingredient::create(request()->validate([
            'ingredient' => ['required', 'min:2'],
            'category_id' => ['required'],
            'stock' => ['required', 'numeric', 'min:1']
        ]));

        return redirect()->route('ingredients.index');
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
    public function edit(Ingredient $ingredient)
    {
        // dd($ingredient);
        $categories = Category::get();

        return view('ingredients.edit', compact('ingredient', 'categories'));
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
        Ingredient::create(request()->validate([
            'ingredient' => ['required', 'min:2'],
            'category_id' => ['required'],
            'last_order' => ['required', 'numeric', 'min:1']
        ]));

        return redirect()->route('ingredients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $ingredient)
    {
        dd($ingredient);
    }
}
