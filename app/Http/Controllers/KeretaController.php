<?php

namespace App\Http\Controllers;

use App\Models\Kereta;
use App\Models\Stasiun;
use App\Models\StasiunKereta;
use Illuminate\Http\Request;
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
                Kereta::where('id',$id)->update([
                    "nama_kereta"=>$request->nama_kereta,
                    "kelas"=>$request->kelas,
                    "stasiun_from_id"=>$request->stasiun_from_id,
                    "jam_berangkat"=>$request->jam_berangkat,
                    "stasiun_to_id"=>$request->stasiun_to_id,
                    "harga"=>$request->harga,
                    "jam_tujuan"=>$request->jam_tujuan
                ]);
                $request->validate([
                    "nama_kereta"=>"required",
                    "kelas"=>"required",
                    "stasiun_from_id"=>"required",
                    "jam_berangkat"=>"required",
                    "stasiun_to_id"=>"required",
                    "harga"=>"required",
                    "jam_tujuan"=>"required"
                ]);
                return redirect("/admin")->with('success','Train has been edited');
                break;
            case "DELETE":
                $id = $request->route('id');
                Kereta::where('id',$id)->delete();
                return redirect('/admin')->with('success','Train Deleted Succesfully');
            
        }
        $kereta = Kereta::all();
        $stasiun = Stasiun::all();
        return view('admin.home',["title"=>"Kereta","kereta"=>$kereta,"stasiun"=>$stasiun]);
    }
    public function dashboard()
    {
        return view('admin.dashboard',["title"=>"Admin Dashboard"]);
    }
    
    //Staff Page
    
    //Customer Page
    public function home()
    {

        return view('customer.home',["title"=>"KereteKita"]);
    }
}
