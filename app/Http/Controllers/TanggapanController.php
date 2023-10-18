<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tanggapan;

class TanggapanController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }
    
    function index(){
        $data = Tanggapan::all();
        $user = Auth::user();
        if ($user->level == 'admin') {
            return view('admin.tanggapan.index',compact('data'));
        } elseif ($user->level == 'gurubk') {
            return view('guru.tanggapan.index',compact('data'));
        }
    }
}
