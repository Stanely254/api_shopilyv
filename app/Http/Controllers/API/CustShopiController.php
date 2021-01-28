<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CustShopi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\CustShopiResource;

class CustShopiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $custShopi = CustShopi::all();
        return response(['custshopi' => CustShopiResource::collection($custShopi), 'message' => 'Retrieved Successfully'], 200);
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
            'activation_code' => 'required',
            'active' => 'required',
            'verification_code' => 'required',
            'industry' => 'required',
            'user_id' => 'required',
            'wheretosell' => 'required',
            'salesestimation' => 'required',
            'terms_agreement' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Errors']);
        }

        $custShopi = CustShopi::create($validator);

        return response(['custshopi' => new CustShopiResource($custShopi), 'message' => 'Created Successfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustShopi  $custShopi
     * @return \Illuminate\Http\Response
     */
    public function show(CustShopi $custShopi)
    {
        //
        return response(['custShopi' => new CustShopiResource($custShopi), 'message' => 'Retrieved Successfully'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustShopi  $custShopi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustShopi $custShopi)
    {
        //
        $custShopi->update($request->all());
        return response(['custShopi' => new CustShopiResource($custShopi), 'message' => 'Updated Successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustShopi  $custShopi
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustShopi $custShopi)
    {
        //
        $custShopi->delete();
        return response(['message' => 'Deleted Successfully']);
    }
}