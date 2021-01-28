<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Groups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\GroupsResource;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $groups = Groups::all();
        return response(['groups' => GroupsResource::collection($groups), 'messages' => 'Retrieved Successfully'], 200);
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
            'group_name' => 'required',
            'company_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Stores Validator Errors']);
        }

        $groups = Groups::create($validator);

        return response(['groups' => new GroupsResource($groups), 'message' => 'Created Successfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function show(Groups $groups)
    {
        //
        return response(['groups' => new GroupsResource($groups), 'message' => 'Retrieved Successfully'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Groups $groups)
    {
        //
        $groups->update($request->all());
        return response(['groups' => new GroupsResource($groups), 'message' =>
        'Updated Successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function destroy(Groups $groups)
    {
        //
        $groups->delete();
        return response(['message' => 'Deleted Successfully']);
    }
}