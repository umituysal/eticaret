<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
   
    public function index(){
        $menu='home';
        $sepetsay=DB::select('select count(s.Id) as Id from sepet s,users u where u.Id=s.musteri_id ');
        // $searchkey=\Request::get('search');
        // $products=DB::select('select * from urunler  where Ad like %.$searchkey.% order by Id ');
         $data=DB::select('select * from ayarlar ');
        $turler=DB::select('select * from turu order by adi');
        $slider=DB::select('select * from urunler where Slider="Yes"');
        $kategoriler=DB::select('select * from kategoriler where parent_Id=0 order by adi');
        $yeniler=DB::select('select * from urunler order by Ad');
        $popular=DB::select('select * from urunler order by Id');
        $urun=DB::select('select * from urunler order by Id asc limit 15 ');
        $urunler=DB::select('select * from urunler order by Id desc limit 15 ');
        return view('front.home',compact('turler','yeniler','kategoriler','popular','data','menu','slider','urun','urunler','sepetsay'));
        
    }
    public function search(Request $request){
        $menu='home';
        $count=DB::select('select count(Id) as Id from urunler ');
   
        $search=DB::table('urunler')->where('Ad', 'LIKE', "%{$request->input('query')}%")->get();
        
        $sepetsay=DB::select('select count(s.Id) as Id from sepet s,users u where u.Id=s.musteri_id ');
         $data=DB::select('select * from ayarlar ');
        $turler=DB::select('select * from turu order by adi');
        $slider=DB::select('select * from urunler where Slider="Yes"');
        $kategoriler=DB::select('select * from kategoriler where parent_Id=0 order by adi');
        $yeniler=DB::select('select * from urunler order by Ad');
        $popular=DB::select('select * from urunler order by Id');
        $urun=DB::table('urunler')->select('*')->paginate(10);
        return view('front.search',compact('turler','yeniler','kategoriler','popular','data','menu','slider','urun','sepetsay','search','count'));
        
    }
    public function urunler(){
        $data=DB::select('select * from ayarlar ');
        $menu='urun';
        $count=DB::select('select count(Id) as Id from urunler ');
        $urun=DB::table('urunler')->select('*')->paginate(10);
         $turler=DB::select('select * from turu order by adi');
         $kategoriler=DB::select('select * from kategoriler where parent_Id=0 order by adi');
      
       $sepetsay=DB::select('select count(s.Id) as Id from sepet s,users u where u.Id=s.musteri_id ');
      
        return view('front.urunlerimiz',compact('turler','kategoriler','menu','data','urun','count','sepetsay'));
    }
    public function urunum($id){
        $data=DB::select('select * from ayarlar ');
        $menu='urun';
       
        $katurun=DB::select(" select count(u.Id) as Id from kategoriler s,urunler u where u.kategori_id=s.Id and u.kategori_id=?",[$id]);
        $count=DB::select('select count(Id) as Id from urunler ');
         $turler=DB::select('select * from turu order by adi');
         $kategoriler=DB::select('select * from kategoriler where parent_Id=0 order by adi');
       $urun=DB::select('SELECT  k.adi as kat, u.* 
       FROM urunler u,kategoriler k 
       where u.kategori_id=k.Id and  u.kategori_id=? limit 6 ',[$id]);
       $urunler=DB::select('SELECT  k.adi as kat, u.* 
       FROM urunler u,kategoriler k 
       where u.kategori_id=k.Id and  u.kategori_id=? limit 6,12 ',[$id]);
               $sepetsay=DB::select('select count(s.Id) as Id from sepet s,users u where u.Id=s.musteri_id ');
        return view('front.urunlerim',compact('turler','kategoriler','menu','data','urun','count','sepetsay','katurun','urunler'));
    }
   
    public function urun($id){
        $data=DB::select('select * from ayarlar ');
        $sepetsay=DB::select('select count(s.Id) as Id from sepet s,users u where u.Id=s.musteri_id ');
        $count=DB::select('select count(Id) as Id from urunler ');
        $menu='urun';
        $katurunn=DB::select(' select count(u.Id) as Id from kategoriler s,urunler u where u.kategori_id=s.Id and u.kategori_id=?',[$id]);
         $turler=DB::select('select * from turu order by adi');
         $kategoriler=DB::select('select * from kategoriler where parent_Id=0 order by adi');
         $urunlerim=DB::select('select * from urunler order by Id DESC  limit 4 ');
         $urunleri=DB::select('select * from urunler order by Id asc  limit 4');
       $urun=DB::select('select * from urunler where Id=?',[$id]);
       $resimler=DB::select('select * from urun_resim where urun_id=?',[$id]);
       $urunler=DB::select('SELECT  k.adi as kat, u.* 
       FROM urunler u,kategoriler k
       where u.kategori_id=k.Id and  u.Id=?',[$id]);
       
        return view('front.urun_detay',compact('turler','kategoriler','urunler','resimler','urunlerim','urunleri','menu','data','urun','count','sepetsay','katurunn'));
    }
    public function hakkimizda(){

        $menu='hakkimizda';
        $data=DB::select('select * from ayarlar ');
        $kategoriler=DB::select('select * from kategoriler where parent_Id=0 order by adi');
        $sepetsay=DB::select('select count(s.Id) as Id from sepet s,users u where u.Id=s.musteri_id ');
     
       return view('front.hakkimizda',compact('data','kategoriler','menu','sepetsay'));
   }
   public function iletisim(){

   
    $data=DB::select('select * from ayarlar ');
    $kategoriler=DB::select('select * from kategoriler where parent_Id=0 order by adi');
  $menu='iletisim';
  $sepetsay=DB::select('select count(s.Id) as Id from sepet s,users u where u.Id=s.musteri_id ');
   return view('front.iletisim',compact('data','kategoriler','menu','sepetsay'));
}
public function bize_yazin_formu(){

   
    $data=DB::select('select * from ayarlar ');
    $kategoriler=DB::select('select * from kategoriler where parent_Id=0 order by adi');
  $menu='bizeyazin';
  $sepetsay=DB::select('select count(s.Id) as Id from sepet s,users u where u.Id=s.musteri_id ');
   return view('front.bizeyazin',compact('data','kategoriler','menu','sepetsay'));
}
public function bize_yazin_kaydet(Request $request){
    DB::table('mesajlar')->insert(['AdSoy' => $request->get('adsoy'),
                      'Email' => $request->get('email'),
                      'Tel' => $request->get('tel'),
                      'Konu' => $request->konu,
                      'Mesaj' => $request->mesaj,
                   
                      'Ip'=> $request->ip()
                  ]);
          return redirect('/bizeyazin')->with('success', 'Mesajınız başarılı bir şekilde iletilmiştir.En kısa zamanda geri dönüş yapılacaktır.');
  }
}

