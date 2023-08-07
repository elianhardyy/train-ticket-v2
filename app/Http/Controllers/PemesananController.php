<?php

namespace App\Http\Controllers;

use App\Models\Kereta;
use App\Models\Pemesanan;
use App\Models\Penumpang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
class PemesananController extends Controller
{
    public function pemesanan(Request $request)
    {
        $penumpang = Penumpang::where('id',$request->penumpang_id)->first();
        $kereta = Kereta::where('id',$penumpang->kereta_id)->first();
        $hargatotal = $kereta->harga * $penumpang->penumpang;
        //$request->input('tanggal')= now();

        $pem = $request->validate([
            "username"=>"required",
            "alamat"=>"required",
            "nik"=>"required",
            "harga"=>"required",
            "gerbong"=>"required",
            "tanggal"=>"required",
            "nomor_kursi"=>"required",
            "users_id",
            "penumpang_id",
        ]);
        //$pem['harga'] = $hargatotal;
        $un = $request->input('username');
        $al = $request->input('alamat');
        $nik = $request->input('nik');
        $harga = $request->input('harga');
        $gerbong = $request->input('gerbong');
        $tanggal = $request->input('tanggal');
        $nomorkur = $request->input('nomor_kursi');
        $usersid = $request->input('users_id');
        $penumid = $request->input('penumpang_id');
        foreach ($un as $key=>$val) {
            $data = [
                'username'=>$val,
                "alamat"=>$al[$key],
                "nik"=>$nik[$key],
                "harga"=>$harga[$key],
                "gerbong"=>$gerbong[$key],
                "tanggal"=>$tanggal[$key],
                "nomor_kursi"=>$nomorkur[$key],
                "users_id"=>$usersid[$key],
                "penumpang_id"=>$penumid[$key]
            ];

            Pemesanan::create($data);
        }
      
        return redirect('/print');
        // $pem = Pemesanan::with('penumpang')->with('user')->where('penumpang_id',$pem['penumpang_id'])->where('users_id',$pem['users_id'])->get();
    }
    public function detail(Request $request)
    {
        $param = $request->route('id');
        $pemesanan = Pemesanan::with('penumpang.kereta')->with('user')->where('penumpang_id',$param)->get();
        $singlepem = Pemesanan::with('user')->where('penumpang_id',$param)->first();
        return view('admin.pemesanan',["title"=>"Pemesanan","pemesanan"=>$pemesanan,"singlepem"=>$singlepem]);
    }
    public function editstatus(Request $request)
    {
        $param = $request->route('id');
        Pemesanan::where('penumpang_id',$param)->update([
            'status'=>'sudah'
        ]);
        return redirect()->route('detailpemesanan',["id"=>$param]);
    }
    public function allpemesanan(Request $request)
    {
        $belum = $request->is('status-belum');
        $sudah = $request->is('status-sudah');
       
        if($belum)
        {
            $pemesananbelum = Pemesanan::with('penumpang.kereta')->with('user')->where('status','belum')->get();
            return view('admin.status-belum',["title"=>"Belum bayar","pemesananbelum"=>$pemesananbelum]);
        }
        if($sudah)
        {
            $pemesanansudah = Pemesanan::with('penumpang.kereta')->with('user')->where('status','sudah')->get();
            return view('admin.status-sudah',["title"=>"Sudah bayar","pemesanansudah"=>$pemesanansudah]);
        }
    }

    //Customer
    public function printticket()
    {
        //$pdf = Pdf::loadView('admin.');
        return view('customer.print-ticket',["title"=>"Pemesanan"]);

    }
}
