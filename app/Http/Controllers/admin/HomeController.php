<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){
        return view("admin.home");
    }
    public function settings(){
        $data=DB::select('select * from ayarlar ');
        return view("admin.settings",['data'=>$data]);
    }
    public function settingsupdate(Request $request,$id){
        DB::table('ayarlar')
        ->where('Id', $id)
        ->update(['Siteadi' => $request->get('Siteadi'),
            'Keywords' => $request->get('Keywords'),
            'Description' => $request->get('Description'),
            'Sirketadi' => $request->get('Sirketadi'),
            'smtpserver' => $request->get('smtpserver'),
            'smtpport' => $request->get('smtpport'),
            'smtpemail' => $request->get('smtpemail'),
            'Sifre' => $request->get('Sifre'),
            'Adres' => $request->get('Adres'),
            'Sehir' => $request->get('Sehir'),
            'Tel' => $request->get('Tel'),
            'Fax' => $request->get('Fax'),
            'Email' => $request->get('Email'),
            'hakkimizda' => $request->get('hakkimizda'),
            'iletisim' => $request->get('iletisim'),
            'Title' => $request->get('Title'),
            'Kisi' => $request->get('Kisi'),
            'facebook' => $request->get('facebook'),
            'instagram' => $request->get('instagram'),
            'twitter' => $request->get('twitter'),
      
            
        ]);

return redirect('admin/settings')->with('success', 'Ayarlar güncellendi.');
    }
}
