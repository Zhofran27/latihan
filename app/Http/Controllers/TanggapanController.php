<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tanggapan;
use App\Models\Pelanggaran;
use App\Models\Petugas;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;


class TanggapanController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }
    
    function index(){
        $data = Tanggapan::all();
        $datapel = Pelanggaran::all();
        $datapet = Petugas::all();
        $user = Auth::user();
        if ($user->level == 'admin') {
            return view('admin.tanggapan.index',compact(['data', 'datapel', 'datapet']));
        } elseif ($user->level == 'gurubk') {
            return view('guru.tanggapan.index',compact(['data', 'datapel', 'datapet']));
        }
    }

    public function store(Request $request)
    {
            //
        $validator =Validator::make($request->all(), [
            'id_tang' => 'required',
            'id_pel' => 'required',
            'id_pet' => 'required',
            'tgl_tang' => 'required',
            'isi_tang' => 'required',
        ]);

            //check if validation fails
        if ($validator->fails()) {
         return response()->json($validator->errors(), 422);
        }
            //create post
        $simpan = Tanggapan::create([
            'id_tanggapan' => $request->id_tang,
            'id_pelanggaran' => $request->id_pel,
            'id_petugas' => $request->id_pet,
            'tgl_tanggapan' => $request->tgl_tang,
            'isi_tanggapan' => $request->isi_tang,
         ]);

        if($simpan){
            //redirect dengan pesan sukses
        Alert::success('Simpan Data', 'data tanggapan berhasil disimpan');
        return redirect('/admin/tanggapan');
        }else{
            //redirect dengan pesan error
            Alert::error('Simpan Data', 'data tanggapan gagal disimpan');
        return redirect('/admin/tanggapan');
        }
    }

    public function edit($id)
    {
    //
    $data=Tanggapan::find($id);
    //ubah adalah pengambilan data dari variabel $ubah, namanya harus sama
    return view('admin.tanggapan.index',compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $upd = Tanggapan::find($id);
        
            $upd->update([
            'id_tanggapan' => $request->id_tang,
            'id_pelanggaran' => $request->id_pel,
            'id_petugas' => $request->id_pet,
            'tgl_tanggapan' => $request->tgl_tang,
            'isi_tanggapan' => $request->isi_tang,
            ]);

        
        if($upd){
        Alert::success('Ubah Data', 'data tanggapan berhasil diubah');
        return redirect('/admin/tanggapan');
        }else{
        Alert::success('Ubah Data', 'data tanggapan berhasil diubah');
        return redirect('/admin/tanggapan');
        }
    }

    public function destroy($id)
    {
            //return dd($id);
            $del=Tanggapan::find($id);
            $del->delete(); //perintah untuk hapus
            if($del){
            Alert::success('Hapus Data', 'data tanggapan berhasil dihapus');
            return redirect('/admin/tanggapan');
            }else{
            //redirect dengan pesan error
            Alert::error('Hapus Data', 'data tanggapan gagal dihapus');
            return redirect('/admin/tanggapan');
            }
    }
}
