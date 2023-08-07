<?php

namespace App\Http\Controllers;

use App\Models\Stasiun;
use Illuminate\Http\Request;

class StasiunController extends Controller
{
    //Admin Page
    public function stasiun(Request $request)
    {
        $method = $request->method();
        switch ($method) {
            case 'POST':
                $stasiun = $request->validate([
                    "nama_stasiun"=>"required",
                    "slug_stasiun"=>"required"
                ]);
                Stasiun::create($stasiun);
                return redirect('/stasiun')->with('success',"Stasiun has been added");
                break;
            case 'PUT':
                $id = $request->route('id');
                Stasiun::where('id',$id)->update([
                    "nama_stasiun"=>$request->nama_stasiun,
                    "slug_stasiun"=>$request->slug_stasiun
                ]);
                $request->validate([
                    "nama_stasiun"=>"required",
                    "slug_stasiun"=>"required"
                ]);
                return redirect('/stasiun')->with('success',"Train has been edited");
                break;
            case 'DELETE':
                $id = $request->route('id');
                Stasiun::where('id',$id)->delete();
                return redirect('/stasiun')->with('success',"Train has been deleted");
                break;
        }
        $stasiun = Stasiun::all();
        return view('admin.stasiun',["title"=>"Stasiun Kereta","stasiun"=>$stasiun]);
    }
    //Staff Page

    //Customer Page
    public function stasiuncustomer()
    {
        $stasiun = Stasiun::all();
        return view('customer.home',["title"=>"Customer","stasiun"=>$stasiun]);
    }
    
}
