<?php

namespace App\Http\Controllers\front;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function index(){
        $turler=DB::select('select * from turu order by adi');
        $kategoriler=DB::select('select * from kategoriler where parent_Id=0 order by adi');
        $yeniler=DB::select('select * from urunler order by Ad');
        $popular=DB::select('select * from urunler order by Id');
        $menu='login';
        $sepetsay=DB::select('select count(s.Id) as Id from sepet s,users u where u.Id=s.musteri_id ');
        $data=DB::select('select * from ayarlar ');
        return view('front.login',compact('turler','yeniler','kategoriler','popular','menu','data','sepetsay'));
      
    }
    public function login(Request $request){
        if($request->isMethod('post')){
           if (Auth::attempt(['email'=>$request->email,'password'=>$request->password,'role'=>'user','active'=>'true'])) {
             return redirect('/user');
           } else {
              return redirect('/login')->with('message','Hatalı email yada şifre');
           }
        }
     
    }
    public function logout(Request $request){
    
        Auth::logout();
        return redirect('/')->with('message','Kullanıcı çıkış yaptı.');
    }
    public function register(){
        $turler=DB::select('select * from turu order by adi');
        $kategoriler=DB::select('select * from kategoriler where parent_Id=0 order by adi');
        $yeniler=DB::select('select * from urunler order by Ad');
        $popular=DB::select('select * from urunler order by Id');
        $data=DB::select('select * from ayarlar ');
        $sepetsay=DB::select('select count(s.Id) as Id from sepet s,users u where u.Id=s.musteri_id ');
        return view('front.login',compact('turler','yeniler','kategoriler','popular','data','sepetsay'));
      
    }
    public function register_save(Request $request){
        DB::table('users') ->insert(
            [
                'name' =>$request->get('name'),

                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password'))
            ]);
            return redirect('/login')->with('message','Login Olabilirsin.');
    }

}
