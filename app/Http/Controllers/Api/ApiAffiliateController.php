<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Affiliate;
use Illuminate\Support\Facades\Validator;
class ApiAffiliateController extends Controller
{
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'required',
        ]);

        $errors = $validator->errors();

        if ($errors->has('kode')) {
            return response()->json([
                'status' => false,
                'message' => 'masukan kode dengan benar',
                'code'    => 400,
            ],400);
        }

        $data=Affiliate::index($request->kode);

        if($data){
            return response()->json([
                'status' => true,
                'message' => 'success get data',
                'code'    => 200,
                'data'    => $data,
            ],200);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'failed get data',
                'code'    => 400,
            ],400);
        }
    }

    public function detail($kode){
        dd($kode);
    }
}
