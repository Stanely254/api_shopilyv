<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Categories;
use App\Models\CustShopi;
use App\Models\Groups;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ShopiStores;
use App\Models\Stores;
use App\Models\UserGroups;
use App\Models\UserPlans;
use Brick\Math\BigInteger;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        //$newUser = User::where('email', '=', $request->)
        $email = DB::table('users')->where('email', '=', $request->email)->first();
        $phone = DB::table('users')->where('phone', '=', $request->phone)->first();
        if($email != null || $phone != null){
            return response(['message' => 'user already registered'], 403);
        } else {
            $validatedData = $request->validate([
                'name' => 'required|max:55',
                'email' => 'email|required|unique:users',
                'password' => 'required',
                'name' => 'required',
                'name' => 'required',
                'phone' => 'required|unique:users',
                'gender' => 'required',
                'level' => 'required',
                'type' => 'required',
                'location' => 'required',
                'background' => 'required',
                'company_id' => 'required',
                ''
            ]);   
        }

        $validatedData['password'] = Hash::make($request->password);

        $user = User::create($validatedData);
        //$this->insert_shopi_store($request);

        $accessToken = $user->createToken('authToken')->accessToken;

        return response(['user' => $user, 'access_token' => $accessToken], 201);
    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'This User does not exist, check your details'], 400);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['user' => auth()->user(), 'access_token' => $accessToken]);
    }

    protected function get_industry_code($industry)
    {
        $industry_code = "";
        switch ($industry) {
            case 'Fashion':
                $industry_code = "09001";
            case 'Electronics and Computers':
                $industry_code = "09002";
            case 'Hardware':
                $industry_code = "09003";
            case 'Cosmetics':
                $industry_code = "09004";
            case 'Foods':
                $industry_code = "09005";
            case 'Beddings and Kitchenware':
                $industry_code = "09006";
                break;

            default:
                $industry_code = "09001";
        }

        return $industry_code;
    }

    // protected function insert_shopi_store(Request $request, String $storename)
    // {
    //     $validatedData = $request->validate([
    //         'shopistore_name' => $storename,
    //         'date_created' => time()
    //     ]);

    //     $shopi_store = ShopiStores::create($validatedData);
    //     //$id = $shopi_store->id;
    //     return response(['shopi_stores' => $shopi_store], 201);
    // }

    // protected function insert_store(Request $request, String $storename, String $type, String $company_id, String $location_name, String $location_lat, String $location_lng)
    // {
    //     $validatedData = $request->validate([
    //         'name' => $storename,
    //         'type' => $type,
    //         'active' => 1,
    //         'company_id' => $company_id,
    //         'location_name' => $location_name,
    //         'location_lat' => $location_lat,
    //         'location_lng' => $location_lng
    //     ]);

    //     $stores = Stores::create($validatedData);
    //     //$id = $stores->id;
    //     return response(['stores' => $stores], 201);
    // }

    // protected function insert_cust_shopi(Request $request, String $company_id,  String $activationCode, int $active, int $verificatio_status, String $industry, BigInteger $user_id, String $station, String $estimation, String $terms)
    // {
    //     $industry_code = $this->get_industry_code($industry);
    //     $validatedData = $request->validate([
    //         'company_id' => $company_id,
    //         'activation_code' => $activationCode,
    //         'active' => $active,
    //         'verification_status' => $verificatio_status,
    //         'user_otp' => md5(rand()),
    //         'industry' => $industry_code,
    //         'user_id' => $user_id,
    //         'wheretosell' => $station,
    //         'salesestimation' => $estimation,
    //         'terms_agreement' => $terms
    //     ]);

    //     $custShopi = CustShopi::create($validatedData);

    //     return response(['custShopi' => $custShopi, 'message' => 'Create Successful'], 201);
    // }

    // protected function insert_groups(Request $request, String $group_name, String $company_id)
    // {
    //     $validatedData = $request->validate([
    //         'group_name' => $group_name,
    //         'company_id' => $company_id
    //     ]);

    //     $groups = Groups::create($validatedData);
    //     return response(['groups' => $groups, 'message' => 'Created Successful'], 201);
    // }

    // protected function insert_user_groups(Request $request, int $user_id, int $group_id, String $company_id)
    // {
    //     $validatedData = $request->validate([
    //         'user_id' => $user_id,
    //         'group_id' => $group_id,
    //         'company_id' => $company_id
    //     ]);

    //     $user_groups = UserGroups::create($validatedData);
    //     return response(['user_groups' => $user_groups, 'message' => 'Created Successful'], 201);
    // }

    // protected function insert_default_industry(Request $request, String $name, String $company_id)
    // {
    //     $validatedData = $request->validate([
    //         'name' => $name,
    //         'company_id' => $company_id,
    //         'active' => 1
    //     ]);

    //     $categories = Categories::create($validatedData);
    //     return response(['categories' => $categories, 'message' => 'Created Successful'], 201);
    // }

    // protected function insert_default_brand(Request $request, STring $brand, String $company_id)
    // {
    //     $validatedData = $request->validate([
    //         'name' => $brand,
    //         'active' => 1,
    //         'company_id' => $company_id
    //     ]);

    //     $brands = Brands::create($validatedData);

    //     return response(['brands' => $brands, 'message' => 'Created Successful'], 201);
    // }

    // protected function insert_user_plans(Request $request, BigInteger $company_id, int $starter, int $starter_status)
    // {
    //     $start = time();
    //     $end = time() + 60 * 60 * 24 * 30;;
    //     $validatedData = $request->validate([
    //         'company_id' => $company_id,
    //         'starter' => $starter,
    //         'starter_start_date' => $start,
    //         'starter_end_date' => $end
    //     ]);

    //     $user_plans = UserPlans::create($validatedData);
    //     return response(['user_plans' => $user_plans, 'message' => 'Created Successfully'], 201);
    // }

    protected function send_message(String $to, String $from, String $message)
    {
        $username = "Shopilyv";
        $password = "WorthBill2030$";
        $auth = base64_encode($username . ":" . $password);
        $api_url = 'https://api.infobip.com/sms/2/text/single';
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $api_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{ \"from\":\"$from\", \"to\":\"$to\", \"text\":\"$message.\" }",
            CURLOPT_HTTPHEADER => array(
                "accept: application/json",
                "authorization: Basic " . json_encode($auth),
                "content-type: application/json"
            ),
        ));

        $response = curl_exec($curl);
    }
}