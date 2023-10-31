<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pelanggaran;
use App\Models\Petugas;
use App\Models\Siswa;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PelanggaranController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }
    
    function index(){
        $data = Pelanggaran::all();
        $siswas =Siswa::all();
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

    public function store(Request $request)
    {
            //
        $validator =Validator::make($request->all(), [
        'id_pel' => 'required',
        'ns' => 'required',
        'tgl_pel' => 'required',
        'isi_pel' => 'required',
        'ft' => 'required',
        ]);

            //check if validation fails
        if ($validator->fails()) {
         return response()->json($validator->errors(), 422);
        }
            //create post
        $simpan = Pelanggaran::create([
        'id_pelanggaran' => $request->id_pel,
        'nis' => $request->ns,
        'tgl_pelanggaran' => $request->tgl_pel,
        'isi_pelanggaran' => $request->isi_pel,
        'foto' => $request->ft,
        ]);

        if($simpan){
            //redirect dengan pesan sukses
        Alert::success('Simpan Data', 'data pelanggaran berhasil disimpan');
        return redirect('/admin/pelanggaran');
        }else{
            //redirect dengan pesan error
            Alert::error('Simpan Data', 'data pelanggaran gagal disimpan');
        return redirect('/admin/pelanggaran');
        }
    }

    public function destroy(string $id)
    {
            //return dd($id);
            $del=Pelanggaran::find($id);
            $del->delete(); //perintah untuk hapus
            if($del){
            Alert::success('Hapus Data', 'data pelanggaran berhasil dihapus');
            return redirect('/admin/pelanggaran');
            }else{
            //redirect dengan pesan error
            Alert::error('Hapus Data', 'data pelanggaran gagal dihapus');
            return redirect('/admin/pelanggaran');
            }
    }
 }