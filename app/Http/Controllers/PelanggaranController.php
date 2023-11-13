<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pelanggaran;
use App\Models\Petugas;
use App\Models\Siswa;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf;

class PelanggaranController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }
    
    function index(){
        $data = Pelanggaran::all();
        $dataSiswa = Siswa::all();
        $user = Auth::user();
        if ($user->level == 'admin') {
            return view('admin.pelanggaran.index',compact(['data', 'dataSiswa']));
        } elseif ($user->level == 'gurubk') {
            return view('guru.pelanggaran.index',compact(['data', 'dataSiswa']));
        }
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $data = Siswa::where('nama', 'like', "%" . $keyword . "%")->paginate(5);
        return view('guru.pelanggaran.index', compact(['data']))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    function view_pdf(){
        $data=Pelanggaran::limit(10)->get();
        $pdf=PDF::loadview('admin.pelanggaran-pdf',compact(['data']));
        $pdf->setPaper('A4','portrait');
        return $pdf->stream('pelanggaran.pdf');
        // return $pdf->stream('pelanggaran.pdf'); //stream untuk lihat dahulu
        }

    public function store(Request $request)
    {
            //
        $this->validate($request, [
            'idpel' => 'required',
            'nis' => 'required',
            'tgl' => 'required',
            'isi' => 'required',
            'foto' => 'mimes:jpg,jpeg,png|max:2048'
            ]);
                //proses upload gambar
        if($request->hasFile('foto')) {
        $image = $request->file('foto');
        $image->move(public_path('foto'),$image->getClientOriginalName());
        $simpan = Pelanggaran::create([
            'id_pelanggaran' => $request->idpel,
            'nis' => $request->nis,
            'tgl_pelanggaran' => $request->tgl,
            'isi_pelanggaran' => $request->isi,
            'foto' => $image->getClientOriginalName()
        ]);
        }elseif($request->file('foto') == "") {
        Alert::error('ERROR Simpan Data','Foto pelanggaran wajib dilampirkan');
            return redirect('/admin/pelanggaran');
        }
                
        if($simpan){
                //redirect dengan pesan sukses
            Alert::success('Simpan Data', 'data pelanggaran sukses di simpan');
            return redirect('/admin/pelanggaran');
            }else{
                //redirect dengan pesan error
            Alert::error('Simpan Data', 'data pelanggaran gagal di simpan');
            return redirect('/admin/pelanggaran');
            }
    }

    public function edit($id)
    {
    //
    $data=Pelanggaran::find($id);
    //ubah adalah pengambilan data dari variabel $ubah, namanya harus sama
    return view('admin.pelanggaran.index',compact(['data']));
    }

    public function update(Request $request, string $id)
    {

        $this->validate($request, [
            'idpel' => 'required',
            'nis' => 'required',
            'tgl' => 'required',
            'isi' => 'required',
            'foto' => 'mimes:jpg,jpeg,png|max:2048'
        ]);
            //proses upload gambar
        $upd = Pelanggaran::find($id);
        if($request->hasFile('foto')) {
        $image = $request->file('foto');
        $image->move(public_path('foto'),$image->getClientOriginalName());
        $upd ->update([
            'id_pelanggaran' => $request->idpel,
            'nis' => $request->nis,
            'tgl_pelanggaran' => $request->tgl,
            'isi_pelanggaran' => $request->isi,
            'foto' => $image->getClientOriginalName()
        ]);
        }elseif($request->file('foto') == "") {
        $upd ->update([
            'id_pelanggaran' => $request->idpel,
            'nis' => $request->nis,
            'tgl_pelanggaran' => $request->tgl,
            'isi_pelanggaran' => $request->isi
        ]);
        }
        if($upd){
            //redirect dengan pesan sukses
        Alert::success('Ubah Data', 'data pelanggaran sukses di ubah');
            return redirect('/admin/pelanggaran');
        }else{
            //redirect dengan pesan error
            
        Alert::error('Ubah Data', 'data pelanggaran gagal di ubah');
            return redirect('/admin/pelanggaran');
        }
    }

    public function destroy(string $id)
    {
            //return dd($id);
        $del=Pelanggaran::find($id);
        $del->delete(); //perintah untuk hapus
        if($del){
        Alert::success('Hapus Data', 'data pelanggaran sukses di hapus');
        return redirect('/admin/pelanggaran');
        }else{
        //redirect dengan pesan error
        Alert::error('Hapus Data', 'data pelanggaran gagal di hapus');
        return redirect('/admin/pelanggaran');
        }
    }
 }