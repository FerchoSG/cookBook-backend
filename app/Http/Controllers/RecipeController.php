<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Recipe;
use App\Models\User;
class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::with('recipes')->find($request->user()->id);
        $userRecipes = $user->recipes;
        foreach($userRecipes as $recipe)
        {
            $recipe->ingredients = json_decode($recipe->ingredients);
        }
        return response()->json([
            "recipes" => $userRecipes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'title' => 'required',
            'ingredients' => 'required',
        ]);

        try {
            Recipe::Create([
                "title" => $request->title,
                "ingredients" => json_encode($request->ingredients),
                "image" => $request->image ?? '',
                "user_id" => 1,
            ]);

            return response()->json(["message"=> "Recipe Created", "error" => false]);
        } catch (\Throwable $th) {
            return response()->json(["message"=> "Internal Error", "error" => true, $th]);
        }
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
        //
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
}
