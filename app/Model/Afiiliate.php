<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
class Afiiliate extends Model
{
    protected $table = 'affiliate';

    public static function index($kode){
        $data = Affiliate::where('affiliate.kode',$kode)
                ->join('affiliate_detail','affiliate.id','=','affiliate_detail.id_affiliate')
                ->select('affiliate.name as affiliate','affiliate.kode','affiliate_detail.*')
                ->get();

        return $data;
    }
}
