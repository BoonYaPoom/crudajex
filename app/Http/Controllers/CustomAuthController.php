<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class CustomAuthController extends Controller
{
    public function login(){
        return view('Login.login');
    }


    public function regis()
    {

        return view('Regis.registration');
    }



    public function homeregis(){

        return view('Regis.home');
    }
    public function registerUser(Request $request){
        $request->validate([
            'username'=> 'required|unique:users',
            'password'=> 'required|min:3|max:20',
        ]);

        $users = new Users();
        $users->username = $request->username;
        $users->password = Hash::make($request->password);
        $users->date = now()->format('Y-m-d H:i:s');
        $users->update = null;
        $users->role = 1;
        $res = $users->save();

        if ($res) {
            if (Hash::check($request->password, $users->password)) {
                // รหัสผ่านถูกต้อง
                return redirect()->route('homelogin')->with('message', 'Users บันทึกข้อมูลสำเร็จ');
            } else {
                // รหัสผ่านไม่ถูกต้อง
                // ดำเนินการต่อที่คุณต้องการ
            }
        } else {
            return back()->with('fail', 'Something went wrong');
        }

    }




    public function loginUser(Request $request){
        $request->validate([

            'username'=> 'required',
            'password'=> 'required|min:3|max:20'

        ]);

        $users = Users::where('username','=',$request->username)->first();
        if($users){

            if(Hash::check($request->password,$users->password)) {

                if ($users->role === '1') {
                    $request->session()->put('loginId',$users->uid);
                    return redirect()->route('adminhome');
                } elseif ($users->role === '2') {
                    return back()->with('fail','ไม่ใช่admin');
                }

                return redirect()->route('adminhome');

            } else{
                return back()->with('fail','Password ผิดพลาด');
            }

        }else{
            return back()->with('fail','Something weong');
        }
    }



    public function adminpage(){

        $data = array();
        if(Session::has('loginId')){
           $data = Users::where('uid', '=', Session::get('loginId'))->first();
        }
        return   view('welcome',compact('data'));
    }
    public function logoutUser(){
        if(Session::has('loginId')){
            Session::pull('loginId');

           return redirect()->route('homelogin');
        }

    }

}
