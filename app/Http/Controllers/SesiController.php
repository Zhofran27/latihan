<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index(){
        return view('login');
    }

    function login(Request $request){ //daftar fungsi ini di route
        $request->validate([
        //cek isian
        'username'=>'required',
        'password'=>'required'
        ],
        //peringatan
        [
        'username.required' => 'username wajib diisi!',
        'password.required' => 'password wajib diisi!'
        ]);

        $infologin = [
            'username'=>$request->username,
            'password'=>$request->password, ];
            if (Auth::attempt($infologin)) {
            // echo "sukses";
            // exit();
            $user = Auth::user();
                if ($user->level == 'admin') {
                    return redirect('/admin');
                } elseif ($user->level == 'gurubk') {
                    return redirect('/guru');
                }
            }else{ //jika gagal
            return redirect()->back()->withErrors('username dan password salah')->withInput();
            
        }
    }

    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return Redirect('/');
    }
}
