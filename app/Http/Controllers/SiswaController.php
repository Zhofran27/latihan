<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }
    
    function index(){
        $data = Siswa::all();
        $user = Auth::user();
        if ($user->level == 'admin') {
            return view('admin.siswa.index',compact('data'));
        } elseif ($user->level == 'gurubk') {
            return view('guru.siswa.index',compact('data'));
        }
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $data = Siswa::where('nama', 'like', "%" . $keyword . "%")->paginate(5);
        return view('guru.siswa.index', compact(['data']))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function destroy(string $id)
    {
            //return dd($id);
            $del=Siswa::find($id);
            $del->delete(); //perintah untuk hapus
            if($del){
            Alert::success('Hapus Data', 'data siswa berhasil dihapus');
            return redirect('/admin/siswa');
            }else{
            //redirect dengan pesan error
            Alert::error('Hapus Data', 'data siswa gagal dihapus');
            return redirect('/admin/siswa');
            }
    }
}
