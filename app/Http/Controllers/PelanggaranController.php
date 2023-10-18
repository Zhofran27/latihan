<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pelanggaran;
use App\Models\Siswa;


class PelanggaranController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }
    
    function index(){
        $data = Pelanggaran::all();
        $user = Auth::user();
        if ($user->level == 'admin') {
            return view('admin.pelanggaran.index',compact('data'));
        } elseif ($user->level == 'gurubk') {
            return view('guru.pelanggaran.index',compact('data'));
        }
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $data = Siswa::where('nama', 'like', "%" . $keyword . "%")->paginate(5);
        return view('guru.pelanggaran.index', compact(['data']))->with('i', (request()->input('page', 1) - 1) * 5);
    }
 }