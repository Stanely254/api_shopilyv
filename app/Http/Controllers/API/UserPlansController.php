<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\UserPlans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\UserPlansResource;

class UserPlansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_plans = UserPlans::all();
        return response(['user_plans' => UserPlansResource::collection($user_plans), 'message' => 'Retrieved Successfully'], 200);
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
            'company_id' => 'required',
            'starter' => 'required',
            'starter_start_date' => 'required',
            'starter_end_date' => 'required',
            'starter_statsu' => 'required',
            'premium' => 'required',
            'premium_start_date' => 'required',
            'premium_end_date' => 'required',
            'premium_status' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validator Errors']);
        }

        $user_plans = UserPlans::create($validator);

        return response(['user_plans' => new UserPlansResource($user_plans), 'message' => 'Created Successfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserPlans  $userPlans
     * @return \Illuminate\Http\Response
     */
    public function show(UserPlans $userPlans)
    {
        //
        return response(['user_plans' => new UserPlansResource($userPlans), 'message' => 'Retrieved Successfully'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserPlans  $userPlans
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserPlans $userPlans)
    {
        //
        $userPlans->update($request->all());
        return response(['user_plans' => new UserPlansResource($userPlans), 'message' => 'Retrieved Successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserPlans  $userPlans
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserPlans $userPlans)
    {
        //
        $userPlans->delete();
        return response(['message' => 'Deleted Successfully']);
    }
}