<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Stores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\StoresResource;

class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $stores = Stores::all();
        return response(['stores' => StoresResource::collection($stores), 'message' => 'Retrieved Succefully'], 200);
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
            'type' => 'required',
            'active' => 'required'
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Stores Validator Errors']);
        }

        $stores = Stores::create($data);

        return response(['stores' => new StoresResource($stores), 'message' => 'Created successfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stores  $stores
     * @return \Illuminate\Http\Response
     */
    public function show(Stores $stores)
    {
        //
        return response(['stores' => new StoresResource($stores), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stores  $stores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stores $stores)
    {
        //
        $stores->update($request->all());
        return response(['stores' => new StoresResource($stores), 'message' => 'Updated Successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Storess  $storess
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stores $stores)
    {
        //
        $stores->delete();
        return response(['message' => 'Deleted Successfully']);
    }
}