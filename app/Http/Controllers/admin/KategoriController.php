<?php

namespace App\Http\Controllers\admin;

use App\Kategoriler;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function index()
    {
        $sql='select * from kategoriler order by adi';
        $kategoriler=DB::select($sql);
        return view("admin.kategori_listesi",['kategoriler'=>$kategoriler]);
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



    public function store(Request $request)
    {
        $urun=new Kategoriler();

        $urun->adi=$request->get('ad');

        $urun->parent_Id=$request->get('kategori');

        $urun->Durum=$request->get('durum');

        $urun->save();
        return redirect('admin/kategoriler')->with('success', 'kategori eklendi.');
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
        $kategoriler=DB::select('select * from kategoriler where parent_Id=0 order by adi');


        $data=DB::select('select a.* ,b.adi as kategori
        from kategoriler a 
        left JOIN kategoriler b
        on a.parent_Id=b.Id 
        where  a.Id=?',[$id]);
			
        return view('admin.kategori_duzenleme',compact('data','kategoriler'));
    }


    public function update(Request $request, $id)
    {

            DB::table('kategoriler')
                ->where('Id', $id)
                ->update(['adi' => $request->get('ad'),

                    'parent_Id' => $request->get('kategori'),

                    'Durum' => $request->get('durum'),

                ]);

        return redirect('admin/kategoriler')->with('success', 'kategori güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::select('delete from kategoriler where Id=?',[$id]);
        return redirect('admin/kategoriler')->with('success', 'Kategori Silindi.');

    }
}
