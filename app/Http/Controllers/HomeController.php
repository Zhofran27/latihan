<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggaran;

class HomeController extends Controller
{
    public function index()
    {
        $data = Pelanggaran::all();
        return view('home.index',compact('data'));
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $data =Pelanggaran::where('nis', 'like', "%" . $keyword . "%")->paginate(5);
        return view('home', compact(['data']))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
