<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ShopiStores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ShopiStoresResource;

class ShopiStoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $shopiStores = ShopiStores::all();
        return response(['shopi_stores' => ShopiStoresResource::collection($shopiStores), 'message' => 'Retrieved Successfully'], 200);
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
            'storename' => 'required|max:255',
            'date_created' => 'required|max:255'
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 'ShopiStores Failed']);
        }

        $shopiStores = ShopiStores::create($data);

        return response(['shopi_stores' => new ShopiStoresResource($shopiStores), 'message' => 'Created Successfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShopiStores  $shopiStores
     * @return \Illuminate\Http\Response
     */
    public function show(ShopiStores $shopiStores)
    {
        //
        return response(['shopi_stores' => new ShopiStoresResource($shopiStores), 'message' => 'Retrieved Successfully'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShopiStores  $shopiStores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShopiStores $shopiStores)
    {
        //
        $shopiStores->update($request->all());
        return response(['shopi_stores' => new ShopiStoresResource($shopiStores), 'message' => 'Updated Successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShopiStores  $shopiStores
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShopiStores $shopiStores)
    {
        //
        $shopiStores->delete();
        return response(['message' => 'Deleted Successfully']);
    }
}