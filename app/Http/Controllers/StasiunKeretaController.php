<?php

namespace App\Http\Controllers;

use App\Models\Kereta;
use App\Models\Penumpang;
use App\Models\Stasiun;
use App\Models\StasiunKereta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StasiunKeretaController extends Controller
{
    //admin
    public function stasiunkereta(Request $request)
    {
        $stasiunkereta = StasiunKereta::with('kereta')->with('stasiunTo')->with('stasiunFrom')->get();
        $stasiun = Stasiun::all();
        $kereta = Kereta::all();
        $method = $request->method();
        switch ($method) {
            case 'POST':
                $pemberhentian = $request->validate([
                    "jam_kereta_from"=>"required",
                    "jam_kereta_to"=>"required",
                    "stasiun_from_id"=>"required",
                    "stasiun_to_id"=>"required",
                    "kereta_id"=>"required"
                ]);
                StasiunKereta::create($pemberhentian);
                return redirect('/pemberhentian')->with('success','Stasiun');
                break;
            case 'PUT':
                $param = $request->route('id');
                StasiunKereta::where('id',$param)->update([
                    "jam_kereta_from"=>$request->jam_kereta_from,
                    "jam_kereta_to"=>$request->jam_kereta_to,
                    "stasiun_from_id"=>$request->stasiun_from_id,
                    "stasiun_to_id"=>$request->stasiun_to_id,
                    "kereta_id"=>$request->kereta_id
                ]);
                $request->validate([
                    "jam_kereta_from"=>"required",
                    "jam_kereta_to"=>"required",
                    "stasiun_from_id"=>"required",
                    "stasiun_to_id"=>"required",
                    "kereta_id"=>"required"
                ]);
                return redirect("/pemberhentian")->with('success','Train has been edited');
                break;
            case 'DELETE':
                $param = $request->route('id');
        }
 
        return view('admin.stasiun_kereta',["title"=>"Stasiun Kereta","pemberhentian"=>$stasiunkereta,"stasiun"=>$stasiun,"kereta"=>$kereta]);
    }
    public function jadwal(Request $request)
    {
        $berangkat = $request->input('idberangkat');
        $tujuan = $request->input('idtujuan');
        $pass = $request->input('penumpang');
        $dateorder = $request->input('tanggal_pesan');
        $category = $request->input('kategori');
        $pem = StasiunKereta::with('kereta')->with('stasiunTo')->with('stasiunFrom')->where('stasiun_from_id',$berangkat)->where('stasiun_to_id',$tujuan)->get();
        $tujuanonly = StasiunKereta::with('kereta')->with('stasiunTo')->where('stasiun_to_id',$tujuan)->first();
        return view('admin.kereta-pemesanan',["title"=>"Pilih Kereta","pem"=>$pem,"tujuan"=>$tujuan,"tujuanonly"=>$tujuanonly,"pass"=> $pass,"dateorder"=>$dateorder,"category"=>$category]);
    }
    public function sk(Request $request)
    {
        $kereta = $request->input('kereta_id');
        $stasiunkereta = $request->input('stasiun_kereta_id');
        dd($stasiunkereta);
     }
    //customer
    public function pemberhentian(Request $request)
    {
        
        
        $berangkat = $request->input('idberangkat');
        $tujuan = $request->input('idtujuan');
        $dewasa = $request->input('cat_dewasa');
        $anak = $request->input('anak');
        $dateorder = $request->input('tanggal_pesan');
        $category = $request->input('kategori');
        $pem = StasiunKereta::with('kereta')->with('stasiunTo')->with('stasiunFrom')->where('stasiun_from_id',$berangkat)->where('stasiun_to_id',$tujuan)->get();
        $tujuanonly = StasiunKereta::with('kereta')->with('stasiunTo')->where('stasiun_to_id',$tujuan)->first();
        return view('customer.pemberhentian',["title"=>"Pilih Kereta","pem"=>$pem,"tujuan"=>$tujuan,"tujuanonly"=>$tujuanonly,"pass"=> $dewasa,"dateorder"=>$dateorder,"category"=>$category,"anak"=>$anak]);
             
    }

   
}
