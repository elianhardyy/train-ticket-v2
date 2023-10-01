<?php

namespace App\Http\Controllers;

use App\Models\Kereta;
use App\Models\PemesananOffline;
use Illuminate\Http\Request;

class PemesananOfflineController extends Controller
{
    public function home(Request $request)
    {
        $method = $request->method();
        $kereta = $request->route('kereta');
        $stasiunkereta = $request->route('stasiunkereta');
        $getsinglekereta = Kereta::where('id',$kereta)->first();
        //$stasiunkereta = $request->query('stasiun_kereta');
        switch ($method) {
            case 'POST':
                $nomorkursi = $request->input('nomor_kursi');
                $pemesanan = $request->validate([
                    'kereta_id'=>'required',
                    'stasiun_kereta_id'=>'required',
                    'nama'=>'required',
                    'nik'=>'required',
                    'gerbong'=>'required',
                    'kursi'=>'required'
                ]);
                $pemesanan['kursi'] = $nomorkursi . $pemesanan['kursi'];
                PemesananOffline::create($pemesanan);
                return redirect()->route('addpass');
                break;
        }
    
        return view('admin.pemesanan-offline',["title"=>"Pemesanan Oleh Admin","kereta"=>$kereta,"stasiunkereta"=>$stasiunkereta,"getsinglekereta"=>$getsinglekereta]);
    }
}
