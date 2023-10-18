<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Inp_pelanggaran;

class AdminController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }
    
    function index(){
        // echo 'Selamat datang';
        // echo '<h1>'. Auth::user()->nama .'</h1>';
        // echo "<br><a href='logout'>logout</a>";
        $data =Inp_pelanggaran::all();
        return view('admin.index',compact('data'));
    }

    
}
