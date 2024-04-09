<?php

namespace App\Http\Controllers;

use App\Models\Kereta;
use App\Models\Pemesanan;
use App\Models\Penumpang;
use Barryvdh\DomPDF\Facade\Pdf ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class PemesananController extends Controller
{
    public function pemesanan(Request $request)
    {   
        $penumpang = Penumpang::where('id',$request->penumpang_id)->first();
        $kereta = Kereta::where('id',$penumpang->kereta_id)->first();
        $hargatotal = $kereta->harga * $penumpang->penumpang;
        //$request->input('tanggal')= now();

        // $request->validate([
        //     "username[]"=>"required",
        //     "alamat[]"=>"required",
        //     "nik[]"=>"required",
        //     "harga[]"=>"required",
        //     "gerbong[]"=>"required",
        //     "tanggal[]"=>"required",
        //     "nomor_kursi[]"=>"required",
        //     "users_id",
        //     "penumpang_id",
        // ]);
        //$pem['harga'] = $hargatotal;
        $un = $request->input('username');
        $al = $request->input('alamat');
        $nik = $request->input('nik');
        $harga = $request->input('harga');
        $jenisGerbong = $request->input('jenis_gerbong');
        $gerbong = $request->input('gerbong');
        $tanggal = $request->input('tanggal');
        $nomorkur = $request->input('nomor_kursi');
        $hurufkur = $request->input('huruf_kursi');
        $usersid = $request->input('users_id');
        $penumid = $request->input('penumpang_id');
        $uuid = $request->input('uuid');
        foreach ($un as $key=>$val) {   
            $data = [
                'uuid'=>$uuid[$key],
                'username'=>$val,
                "alamat"=>$al[$key],
                "nik"=>$nik[$key],
                "harga"=>$harga[$key],
                "jenis_gerbong"=>$jenisGerbong[$key],
                "gerbong"=>$gerbong[$key],
                "tanggal"=>$tanggal[$key],
                "huruf_kursi"=>$hurufkur[$key],
                "nomor_kursi"=>$nomorkur[$key],
                "users_id"=>$usersid[$key],
                "penumpang_id"=>$penumid[$key]
            ];

            Pemesanan::create($data);
            
        }
        
        return redirect('/ticket-order');
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
            $pemesanansudah = Pemesanan::with('penumpang.kereta')->with('user')->where('status','sudah')->orderBy('users_id','desc')->get();
            if ($request->input()) {
                $awal = $request->input('awal');
                $akhir = $request->input('akhir');
                $pemesanansudah = Pemesanan::with('penumpang.kereta')->with('user')->where('status','sudah')->whereBetween('created_at',[$awal,$akhir])->orderBy('users_id','desc')->get();
            }
            return view('admin.status-sudah',["title"=>"Sudah bayar","pemesanansudah"=>$pemesanansudah]);
        }
    }

    //Customer

    public function pemesanantiket()
    {
        $pemesanan = Pemesanan::with('penumpang')->with('penumpang.kereta')->with('penumpang.stasiunkereta')->with('penumpang.stasiunkereta.stasiunTo')->with('penumpang.stasiunkereta.stasiunFrom')->with('user')->where('users_id',auth()->user()->id)->where('status','unpaid')->get();
        //$pemesanan = Pemesanan::with('penumpang')->with('penumpang.kereta')->with('penumpang.stasiunkereta')->with('penumpang.stasiunkereta.stasiunTo')->with('penumpang.stasiunkereta.stasiunFrom')->with('user')->where('users_id',auth()->user()->id)->first();
        $title = "Pemesanan Tiket";
        return view('customer.print-checkout',compact('pemesanan','title'));
    }
    public function printticket(Request $request)
    {
        //$pdf = Pdf::loadView('admin.');
        $pemesanan = Pemesanan::with('penumpang')->with('penumpang.kereta')->with('penumpang.stasiunkereta')->with('penumpang.stasiunkereta.stasiunTo')->with('penumpang.stasiunkereta.stasiunFrom')->with('user')->where('users_id',$request->input('user_id'))->get();
        $title = "Print Tikcet";
        $pdf = Pdf::loadView('customer.print-ticket',compact('pemesanan','title'));
        return $pdf->stream('print-ticket.pdf');

    }
    public function pembayaran(Request $request)
    {

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        $checkout = Pemesanan::with('penumpang')->with('penumpang.kereta')->with('penumpang.stasiunkereta')->with('penumpang.stasiunkereta.stasiunTo')->with('penumpang.stasiunkereta.stasiunFrom')->with('user')->where("users_id",$request->userid)->where('status','unpaid')->get();
        $order = Pemesanan::with('user')->where('users_id',auth()->user()->id)->first();
        $harga = 0;
        $usernamec = "";
        foreach ($checkout as $c) {
            $harga += $c->harga;
            $usernamec += $c->username;
        }
        
        $params = array(
            'transaction_details' => array(
                'order_id' => $order->uuid,
                'gross_amount' => $harga,
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->first_name,
                'last_name' => Auth::user()->last_name,
                'username'=>$usernamec,
                'email' => Auth::user()->email,
                'phone' => Auth::user()->phone,
            ),
        );
    
        $title = "Pembayaran";
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('customer.checkout',compact('snapToken','checkout','title'));
    }
    //get by uuid, then order->users_id == auth()->user()->id;
    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        
        $hashed = hash('sha512',$request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed == $request->signature_key){
            if($request->transaction_status == 'capture'){
                $callback = Pemesanan::where("uuid",$request->order_id)->first();
                //DB::table('pemesanans')->where('users_id',$callback->users_id)->update(['status'=>'paid']);
                Pemesanan::where("users_id",$callback->users_id)->update([
                    'status'=>'paid'
                ]);
                return redirect('/ticket-order');
            }
        }
    }
}
