<?php

namespace App\Http\Controllers\admin;

use App\Urunler;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UrunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sql='SELECT  turu.adi as tur, kategoriler.adi as kat, urunler.*  FROM urunler
			LEFT JOIN turu 
			ON urunler.turu=turu.Id
			LEFT JOIN kategoriler
			ON urunler.kategori_id=kategoriler.Id
			ORDER BY urunler.Ad';
        $urunler=DB::select($sql);
        return view("admin.urun_listesi",['urunler'=>$urunler]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $turler=DB::select('select * from turu order by adi');
        $kategoriler=DB::select('select * from kategoriler order by adi');
        return view('admin.urun_ekleme',['turu'=>$turler],['kategori'=>$kategoriler]);
    }



    public function store(Request $request)
    {
       
        $this->validate($request, [

            'resim' => 'required',
            'resim.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
        if ($request->hasFile('resim'))
        {
            $file = $request->file('resim');
            //Name of you image name
            $name = $file->getClientOriginalName();
            $file->move(public_path(). '/userfiles/', $name);
        }
        DB::table('urunler')->insert([
            
            'Ad'=>$request->ad,
            'Adet'=>$request->adet,
            'Fiyat'=>$request->fiyat,
            'Durum'=>$request->durum,
            'turu'=>$request->turu,
            'Aciklama'=>$request->aciklama,
            'kategori_id'=>$request->kategori,
            'Slider'=>$request->slider,
            'Resim' =>$name 
        ]);

        
       
        return redirect('admin/urunler')->with('success', 'Ürün eklendi.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "goster".$id;
    }

    /**
     * Show the form for editing the specified resource.
     *     return view('admin.urun_duzenleme',compact('data','turler','kategoriler'));
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $turler=DB::select('select * from turu order by adi');
        $kategoriler=DB::select('select * from kategoriler order by adi');


        $data=DB::select('SELECT  t.adi as tur, k.adi as kat, u.* 
         FROM urunler u,kategoriler k,turu t
         where u.kategori_id=k.Id and u.turu=t.Id and  u.Id=?',[$id]);
			
        return view('admin.urun_duzenleme',compact('data','turler','kategoriler'));
    }


    public function update(Request $request, $id)
    {
        if ($request->hasFile('resim'))
        {
            $file = $request->file('resim');
            //Name of you image name
            $name = $file->getClientOriginalName();
            $file->move(public_path(). '/userfiles/', $name);


        }else
            $name = $request->resim2;
            DB::table('urunler')
                ->where('Id', $id)
                ->update(['Ad' => $request->ad,
                    'Adet' => $request->adet,
                    'Fiyat' => $request->fiyat,
                    'kategori_id' => $request->kategori,
                    'turu' => $request->turu,
                    'Aciklama' => $request->aciklama,
                    'Durum' => $request->durum,
                    'Resim' => $name
                ]);

        return redirect('admin/urunler')->with('success', 'Ürün güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::select('delete from urunler where Id=?',[$id]);
        return redirect('admin/urunler')->with('success', 'Ürün Silindi.');

    }
    public function galeri_formu($id)
    {
        $resimler=DB::select('select * from urun_resim where urun_id=?',[$id]);
        $veri=DB::select('select * from urunler where Id=?',[$id]);
    	
        return view('admin.urun_galeri_formu',compact('veri','resimler'));
    }
    public function galeri_ekle(Request $request)
    {   
       
        if ($request->hasFile('resim'))
        {
            $file = $request->file('resim');
            //Name of you image name
            $name = $file->getClientOriginalName();
            $file->move(public_path(). '/userfiles/', $name);

        }
        DB::table('urun_resim') ->insert(
        [
            'urun_id' =>$request->id,
            'resim' => $name
        ]
    );
        return redirect('admin/urun/galeri/'.$request->id)->with('success', 'Galeri resimi güncellendi.');
    }
    public function galeri_sil($id)
    {
        DB::select('delete from urun_resim where Id=?',[$id]);
        return redirect('admin/urunler/')->with('success', 'Galeriden resimi  Silindi.');

    }

}
