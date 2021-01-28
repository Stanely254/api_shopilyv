<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\CategoriesResource;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Categories::all();
        return response(['categories' => CategoriesResource::collection($categories), 'message' => 'Retrieved Successfully'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        $validators = Validator::make($data, [
            'name' => 'required',
            'active' => 'required',
            'company_id' => 'required',
        ]);

        if ($validators->fails()) {
            return response(['error' => $validators->errors(), 'Validator erros']);
        }

        $categories = Categories::create($validators);
        return response(['categories' => new  CategoriesResource($categories), 'message' => 'Created Successfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $categories)
    {
        //
        return response(['categories' => new CategoriesResource($categories), 'message' => 'Retrieved Successfully'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categories $categories)
    {
        //
        $categories->update($request->all());
        return response(['categories' => new CategoriesResource($categories), 'message' => 'Update Successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categories $categories)
    {
        //
        $categories->delete();
        return response(['message' => 'Deleted Successfully'],);
    }
}