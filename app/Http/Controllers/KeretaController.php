<?php

namespace App\Http\Controllers;

use App\Models\Kereta;
use App\Models\Pemesanan;
use App\Models\PemesananOffline;
use App\Models\Penumpang;
use App\Models\Stasiun;
use App\Models\StasiunKereta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KeretaController extends Controller
{
    //Admin Page
    
    public function keretaList(Request $request)
    {

        $method = $request->method();
        switch ($method) {
            case 'POST':
                $kereta = $request->validate([
                    "nama_kereta"=>"required",
                    "kelas"=>"required",
                    "stasiun_from_id"=>"required",
                    "jam_berangkat"=>"required",
                    "stasiun_to_id"=>"required",
                    "harga"=>"required",
                    "jam_tujuan"=>"required"
                ]);
                Kereta::create($kereta);
                $keretalatest = Kereta::latest('created_at')->first();
                //dd($keretalatest);
                StasiunKereta::create([
                    "jam_kereta_from"=>$request->jam_berangkat,
                    "jam_kereta_to"=>$request->jam_tujuan,
                    "stasiun_from_id"=>$request->stasiun_from_id,
                    "stasiun_to_id"=>$request->stasiun_to_id,
                    "kereta_id"=>$keretalatest["id"]
                ]);
                return redirect('/admin')->with('success','Train has been added');
                break;
            case 'PUT':
                $id = $request->route('id');
                $request->validate([
                    "nama_kereta"=>"required",
                    "kelas"=>"required",
                    "stasiun_from_id"=>"required",
                    "jam_berangkat"=>"required",
                    "stasiun_to_id"=>"required",
                    "harga"=>"required",
                    "jam_tujuan"=>"required"
                ]);
                Kereta::where('id',$id)->update([
                    "nama_kereta"=>$request->nama_kereta,
                    "kelas"=>$request->kelas,
                    "stasiun_from_id"=>$request->stasiun_from_id,
                    "jam_berangkat"=>$request->jam_berangkat,
                    "stasiun_to_id"=>$request->stasiun_to_id,
                    "harga"=>$request->harga,
                    "jam_tujuan"=>$request->jam_tujuan
                ]);
                $keretalatest = Kereta::latest('updated_at')->first();
                StasiunKereta::where('kereta_id',$keretalatest["id"])->update([
                    "jam_kereta_from"=>$keretalatest["jam_berangkat"],
                    "jam_kereta_to"=>$keretalatest["jam_tujuan"],
                    "stasiun_from_id"=>$keretalatest["stasiun_from_id"],
                    "stasiun_to_id"=>$keretalatest["stasiun_to_id"],
                    "kereta_id"=>$keretalatest["id"]
                ]);
                
                return redirect("/admin")->with('success','Train has been edited');
                break;
            case "DELETE":
                $id = $request->route('id');
                Kereta::where('id',$id)->delete();
                return redirect('/admin')->with('success','Train Deleted Succesfully');
            
        }
        $kereta = Kereta::with('stasiunFrom')->with('stasiunTo')->get();
        $stasiun = Stasiun::all();
        return view('admin.home',["title"=>"Kereta","kereta"=>$kereta,"stasiun"=>$stasiun]);
    }
    public function dashboard()
    {
        //bottom
        $kereta = Kereta::all();
        $stasiun = Stasiun::all();
        $pemberhentian = StasiunKereta::all();
        //top
        $penumpang = Penumpang::all();
        $pemesanan = Pemesanan::all();
        $pemesananoffline = PemesananOffline::all();
        $customer = User::role('customer')->get();
        $staff = User::role('staff')->get(); 
        $title = "Admin Dashboard";
        return view('admin.dashboard',compact('kereta','penumpang','pemesanan','pemesananoffline','title','customer','staff','stasiun','pemberhentian'));
    }
    //Staff Page
    
    //Customer Page
    public function home()
    {

        return view('customer.home',["title"=>"KereteKita"]);
    }
}
