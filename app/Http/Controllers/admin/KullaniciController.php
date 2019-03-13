<?php

namespace App\Http\Controllers\admin;

use App\Kullanicilar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class KullaniciController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function index()
    {
        $sql='select * from users order by name';
        $kullanicilar=DB::select($sql);
        return view("admin.kullanici_listesi",['kullanicilar'=>$kullanicilar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$turler=DB::select('select * from turu order by adi');
        $kullanicilar=DB::select('select * from users order by name');
        return view('admin.kullanici_ekleme',['kullanicilar'=>$kullanicilar]);
    }



    public function store(Request $request)
    {
        $kullanici=new Kullanicilar();

        $kullanici->name=$request->get('name');

        $kullanici->email=$request->get('email');
        $kullanici->password=$request->get('password');
        $kullanici->role=$request->get('role');
        $kullanici->active=$request->get('durum');
        $kullanici->adres=$request->get('adres');
        $kullanici->il=$request->get('il');
        $kullanici->ilce=$request->get('ilce');
      
        $kullanici->save();
        return redirect('admin/kullanicilar')->with('success', 'kullanıcılar eklendi.');
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
        $kullanicilar=DB::select('select * from users  where  id=?',[$id]);


        
			
        return view('admin.kullanici_duzenleme',compact('kullanicilar'));
    }


    public function update(Request $request, $id)
    {

            DB::table('users')
                ->where('id', $id)
                ->update(['name' => $request->get('name'),
                    'email' => $request->get('email'),
                    'role' => $request->get('role'),
                    'active' => $request->get('durum'),
                    'adres' => $request->get('adres'),
                    'il' => $request->get('il'),
                    'ilce' => $request->get('ilce')
                ]);

        return redirect('admin/kullanicilar')->with('success', 'Kullanicilar güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::select('delete from users where Id=?',[$id]);
        return redirect('admin/kullanicilar')->with('success', 'Kullanıcılar Silindi.');

    }
}
