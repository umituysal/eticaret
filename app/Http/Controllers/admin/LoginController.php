<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function index(){
        return view("admin.login");
    }
    
    public function login(Request $request){
        if($request->isMethod('post')){
           if (Auth::attempt(['email'=>$request->email,'password'=>$request->password,'role'=>'admin','active'=>'true'])) {
             return redirect('/admin');
           } else {
              return redirect('/admin/login')->with('message','Hatalı email yada şifre');
           }
        }
     
    }
    public function logout(Request $request){
    
        Auth::logout();
        return redirect('/admin/login')->with('message','Kullanıcı çıkış yaptı.');
    }
    public function register(){
        return view("admin.register");
    }
    public function register_save(Request $request){
        DB::table('users') ->insert(
            [
                'name' =>$request->get('name'),

                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password'))
            ]);
            return redirect('/admin/login')->with('message','Login Olabilirsin.');
    }

}
