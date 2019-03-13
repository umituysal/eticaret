<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{  
        public function __construct(){

        $this->middleware('user');
    }
    public function index(){
        $sepetsay=DB::select('select count(s.Id) as Id from sepet s,users u where u.Id=s.musteri_id ');
        $menu='user';
        $turler=DB::select('select * from turu order by adi');
        $kategoriler=DB::select('select * from kategoriler where parent_Id=0 order by adi');
        $yeniler=DB::select('select * from urunler order by Ad');
        $popular=DB::select('select * from urunler order by Id');
        $data=DB::select('select * from ayarlar ');
        return view('front.user',compact('turler','yeniler','kategoriler','popular','menu','data','sepetsay'));
      
    }
    public function profil(){
        $menu='user';
        $sepetsay=DB::select('select count(s.Id) as Id from sepet s,users u where u.Id=s.musteri_id ');
        $turler=DB::select('select * from turu order by adi');
        $kategoriler=DB::select('select * from kategoriler where parent_Id=0 order by adi');
        $yeniler=DB::select('select * from urunler order by Ad');
        $popular=DB::select('select * from urunler order by Id');
        $user=DB::select('select * from users where Id=?',[Auth::user()->id]);
        $data=DB::select('select * from ayarlar ');
        return view('front.profil',compact('turler','yeniler','kategoriler','popular','menu','user','data','sepetsay'));
      
    }
    public function profil_duzenle(Request $request,$id){
        if($request->isMethod('post')){
        DB::table('users')
        ->where('id', $id)
        ->update(['name' => $request->name,
            'tel' => $request->tel,
            'adres' => $request->adres,
            'il' => $request->il,
            'ilce' => $request->ilce,
         
        ]);
        return redirect('profil')->with('success', 'Profil bilgileri güncellendi.');
        }else{
            echo "hata";
        }
      
      
    }
    public function sepete_ekle(Request $request){
        DB::table('sepet')->insert([
            'urun_id'=>$request->urunid,
            'musteri_id'=>Auth::user()->id,
            'adet'=>$request->adet
        ]);
        $id=$request->urunid;
        return redirect("/urun/$id")->with('success','Ürünler sepete eklendi.');

    }
    public function sepetee_ekle(Request $request){
        DB::table('sepet')->insert([
            'urun_id'=>$request->urunid,
            'musteri_id'=>Auth::user()->id,
            'adet'=>$request->adet
        ]);
        $id=$request->urunid;
        return redirect("/urunlerimiz")->with('success','Ürünler sepete eklendi.');

    }
    public function sepetim(){
        $sepetsay=DB::select('select count(s.Id) as Id from sepet s,users u where u.Id=s.musteri_id ');
        $data=DB::select('SELECT * from ayarlar');
        $kategoriler=DB::select('select * from kategoriler where parent_Id=0 order by adi');
        $veriler=DB::select('select k.Ad as ad,k.Fiyat as fiyat,k.Resim as resim,s.*
        from urunler k,sepet s
        where k.Id=s.urun_id and s.musteri_id=?',[Auth::user()->id]);
        $menu="sepet";
        return view('front.sepetim',compact('veriler','data','menu','kategoriler','sepetsay'));
    }
  
    public function sepet_sil($id){

        $sepet= DB::select('delete from sepet where Id=?',[$id]);
        return redirect('/sepetim')->with('success','Ürün sepetten silindi.');
    }
    public function siparis_tamamla(Request $request){
        if($request->isMethod('post')){
        $data=DB::select('SELECT * from ayarlar');
        $kategoriler=DB::select('select * from kategoriler where parent_Id=0 order by adi');
        $user=DB::select('select * from users where Id=?',[Auth::user()->id]);
        $sepetsay=DB::select('select count(s.Id) as Id from sepet s,users u where u.Id=s.musteri_id ');
        $toplam=$request->toplam;
        $menu="sepet";
       
        return view('front.siparis_tamamla',compact('data','menu','kategoriler','toplam','user','sepetsay'));
        }else{
            echo "hata";
        }
    }
    public function satinal(Request $request){
    
    $onay=1;
    if($onay==1){
        DB::table('siparis')->insert([
            'adi'=>$request->name,
          
            'musteri_id'=>Auth::user()->id,
            'tutar'=>$request->toplam,
            'adres'=>$request->adres,
            'tel'=>$request->tel,
            'il'=>$request->il,
            'ilce'=>$request->ilce
        ]);
       $siparisid=DB::getPdo()->lastInsertId();
      
        $veriler=DB::select('select  k.Ad as ad,k.Fiyat as fiyat,k.Resim as resim,s.*
        from urunler k,sepet s
        where k.Id=s.urun_id and s.musteri_id=?',[Auth::user()->id]);
        $menu="sepet";
        foreach($veriler as $rs){
            DB::table('siparis_urunler')->insert([
             'siparis_id'=>$siparisid,
                'musteri_id'=>Auth::user()->id,
                'urun_id'=>$rs->urun_id,
                'adet'=>$rs->adet ,
                'fiyat'=>$rs->fiyat,
                'tutar'=>$rs->adet*$rs->fiyat,
                'adi'=>$rs->ad
            ]);
        }
      
         DB::select('delete from sepet where musteri_id=?',[Auth::user()->id]);
        return redirect('/siparis_son')->with('success','Siparis tamamlandı.');
    }else{
        echo "Bankadan onay alınmamıştır.";
    }
    }
    public function siparis_son(){
        $data=DB::select('select * from ayarlar');
        $sepetsay=DB::select('select count(s.Id) as Id from sepet s,users u where u.Id=s.musteri_id ');
        $kategoriler=DB::select('select * from kategoriler where parent_Id=0 order by adi');
        $menu="user";
        return view('front.siparis_son',compact('data','menu','kategoriler','sepetsay'));
    }
    public function siparisler(){
        $data=DB::select('SELECT * from ayarlar');
        $kategoriler=DB::select('select * from kategoriler where parent_Id=0 order by adi');
        $sepetsay=DB::select('select count(s.Id) as Id from sepet s,users u where u.Id=s.musteri_id ');
        $siparis=DB::select('select * from siparis where musteri_id=?',[Auth::user()->id]);
        $menu="user";
        return view('front.siparisler',compact('data','menu','kategoriler','siparis','sepetsay'));
    }
    public function siparis_detay($id){
    $data=DB::select('select * from ayarlar');
    $sepetsay=DB::select('select count(s.Id) as Id from sepet s,users u where u.Id=s.musteri_id ');
    $siparissay=DB::select('select count(s.siparis_id) as Id from siparis_urunler s,siparis a,users u where  u.Id=s.musteri_id and a.Id=s.siparis_id and s.siparis_id=?',[$id]);
    $kategoriler=DB::select('select * from kategoriler where parent_Id=0 order by adi');
    
    $urunler=DB::select('select a.durum,a.aciklama,k.Resim as resim,s.* from urunler k,siparis_urunler s,siparis a where  k.Id=s.urun_id and s.siparis_id=? ',[$id]);
    
    $menu="user";
   
    return view('front.siparis_urunler',compact('data','menu','urunler','kategoriler','sepetsay','siparissay'));

    }
   
}
