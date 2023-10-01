<?php

namespace App\Http\Controllers;

use App\Models\Kereta;
use App\Models\Pemesanan;
use App\Models\PemesananOffline;
use App\Models\Penumpang;
use App\Models\Stasiun;
use Illuminate\Http\Request;

class PenumpangController extends Controller
{
    //Admin
    public function passangermanage()
    {
        $pass = Penumpang::with('user')->with('kereta')->with('stasiunkereta.stasiunFrom')->with('stasiunkereta.stasiunTo')->get();
        $kereta = Kereta::all();
        $stasiun = Stasiun::all();
        $passoffline = PemesananOffline::with('kereta')->with('stasiunkereta')->get();
        $pemesanan = Pemesanan::with('penumpang.kereta')->with('user')->orderByDesc('created_at')->get();
        //dd($pemesanan);
        return view('admin.pass',["title"=>"Manage Passanger","pass"=>$pass,"kereta"=>$kereta,"stasiun"=>$stasiun,"passoffline"=>$passoffline]);
    }
    public function addpassanger()
    {
        $stasiun = Stasiun::all();
        return view('admin.pass-add',["title"=>"Add Passanger","stasiun"=>$stasiun]);
    }
    //Customer
    public function penumpang(Request $request)
    {
        $penumpang = $request->validate([
            "dewasa"=>"required",
            "anak"=>"required",
            "tanggal_pesan"=>"required",
            "users_id"=>"required",
            "stasiun_kereta_id"=>"required",
            "kereta_id"=>"required"
        ]);
        $jumpenumpang = $penumpang['dewasa'];
        Penumpang::create($penumpang);
        $characters = 'ABCDE';
        $randomNum = rand(1,24);
        $randomNumOthers = rand(1,24);
        $randomGerbong = rand(1,9);
        $randomGerbongOthers = rand(1,9);
        $substrchar = substr(str_shuffle($characters),0,1);
        $substrcharOthers = substr(str_shuffle($characters),0,1);
        $idpenum = Penumpang::with('user')->with('kereta')->with('stasiunkereta')->where('users_id',$penumpang["users_id"])->where('stasiun_kereta_id',$penumpang["stasiun_kereta_id"])->where('kereta_id',$penumpang["kereta_id"])->orderByDesc('id')->first();
        if($idpenum->kereta->kelas == 'Eksekutif')
        {
            $chareks = 'ABCD';
            $substrchar = substr(str_shuffle($chareks),0,1);
            $substrcharOthers = substr(str_shuffle($chareks),0,1);
        }
        return view('customer.pemesanan',
        ["title"=>"Pemesanan",
        "jumpenum"=>$jumpenumpang,
        "idpenum"=>$idpenum,
        "randomNum"=>$randomNum,
        "randomGerbong"=>$randomGerbong,
        "randomHuruf"=>$substrchar,
        "randomNumOthers"=>$randomNumOthers,
        "randomGerbongOthers"=>$randomGerbongOthers,
        "randomHurufOthers"=>$substrcharOthers
    ]);
        
    }
}
// function randomNum()
//                 {
                   
//                     echo rand(1,24);
//                 }
//                 function randomGerbong()
//                 {
//                     echo rand(1,9);
//                 }
//                 function randomKursi()
//                 {
//                     $characters = 'ABCDE';
//                     if($idpenum->kereta->kelas == 'Eksekutif' || $idpenum->kereta->kelas == 'Bisnis')
//                     {
//                         $charactereks = 'ABCD';
//                         echo substr(str_shuffle($charactereks),0,1); 
//                     }
//                     echo substr(str_shuffle($characters),0,1);
//                 }
