<?php

namespace App\Http\Controllers\admin;
use App\Siparis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SiparisController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){
        $siparis=DB::select("select s.*,u.name from siparis s,users u where u.Id=s.musteri_id and s.durum='yeni'");
        return view("admin.siparis_yeni",compact('siparis'));
    }
    public function siparisler($durum){
        $siparis=DB::select("select s.*,u.name from siparis s,users u where u.Id=s.musteri_id and s.durum='$durum'");
        return view("admin.siparisler",compact('siparis','durum'));
    }
    public function siparis_detay($id){
        $siparis=DB::select('select * from siparis where Id=?',[$id]);
        $urunler=DB::select('select a.durum,k.Ad as Ad,k.Resim as resim,s.* from urunler k,siparis_urunler s,siparis a where k.Id=s.urun_id and s.siparis_id=?',[$id]);
        return view("admin.siparis_detay",compact('siparis','urunler'));
    }
    public function siparis_update(Request $request, $id)
    {
       
            DB::table('siparis')
                ->where('Id', $id)
                ->update(['aciklama' => $request->aciklama,
                    'durum' => $request->durum,
                   
                ]);

        return redirect('admin/siparis_yeni')->with('success', 'siparis  güncellendi.');
    }

}
