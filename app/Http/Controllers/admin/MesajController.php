<?php

namespace App\Http\Controllers\admin;

use App\Mesajlar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MesajController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function index()
    {
        $mesajlar=DB::select("select * from mesajlar  where  Durum='Okunmadı'");
        
      
        return view("admin.mesaj_listesi",['mesajlar'=>$mesajlar]);
    }
    public function mesajlar($durum)
    {
       
            $mesajlar=DB::select("select * from mesajlar  where  Durum='$durum'");
            return view("admin.mesajlar",compact('mesajlar','durum'));
    } 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$turler=DB::select('select * from turu order by adi');
        $kategoriler=DB::select('select * from kategoriler order by adi');
        return view('admin.kategori_ekleme',['kategori'=>$kategoriler]);
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
       // $turler=DB::select('select * from turu order by adi');
       $mesajlar=DB::select('select * from mesajlar where Id=?',[$id]);
        return view('admin.mesaj_duzenleme',compact('mesajlar'));
    }


    public function update(Request $request, $id)
    {

            DB::table('mesajlar')
                ->where('Id', $id)
                ->update([
                    'Durum' => $request->get('durum'),
                ]);

        return redirect('admin/mesajlar')->with('success', 'Mesajlar güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::select('delete from mesajlar where Id=?',[$id]);
        return redirect('admin/mesajlar')->with('success', 'Mesaj Silindi.');

    }
}
