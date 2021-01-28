<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ProductsResource;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Products::all();
        return response(['products' => ProductsResource::collection($products), 'message' => 'Retrieved Successfully'], 200);
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
        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'sku' => 'required',
            'cost' => 'required',
            'price' => 'required',
            'dprice' => 'required',
            'qty' => 'required',
            'image' => 'required',
            'description' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required',
            'store_id' => 'required',
            'availability' => 'required',
            'quantity' => 'required',
            'quantity1' => 'required',
            'quantity2' => 'required',
            'quantity3' => 'required',
            'company_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Errors']);
        }

        $products = Products::create($data);

        return response(['products' => new ProductsResource($products), 'message' => 'Created Successfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
        return response(['products' => new ProductsResource($products), 'message' => 'Retrieved Successfully'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        //
        $products->update($request->all());
        return response(['product' => new ProductsResource($products), 'message' => 'Update Successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
        $products->delete();
        return response(['message' => 'Deleted']);
    }
}