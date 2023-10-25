<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Petugas;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;


class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
    $this->middleware('auth');
    }
    
    function index(){
        $data = Petugas::all();
        return view('admin.petugas.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            //
        $validator =Validator::make($request->all(), [
        'id_pet' => 'required',
        'nm' => 'required',
        'usernm' => 'required',
        'passwd' => 'required',
        'lvl' => 'required',
        'tlp' => 'required',
        ]);

            //check if validation fails
        if ($validator->fails()) {
         return response()->json($validator->errors(), 422);
        }
            //create post
        $simpan = Petugas::create([
        'id_petugas' => $request->id_pet,
        'nama' => $request->nm,
        'username' => $request->usernm,

        'password' => bcrypt($request->passwd),
        'level' => $request->lvl,
        'telp' => $request->tlp,
         ]);

        if($simpan){
            //redirect dengan pesan sukses
        Alert::success('Simpan Data', 'data petugas berhasil disimpan');
        return redirect('/admin/petugas');
        }else{
            //redirect dengan pesan error
            Alert::error('Simpan Data', 'data petugas gagal disimpan');
        return redirect('/admin/petugas');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    //
    $data=Petugas::find($id);
    //ubah adalah pengambilan data dari variabel $ubah, namanya harus sama
    return view('admin.petugas.index',compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $upd = Petugas::find($id);
        if($request->password==""){
            $upd->update([
                'id' => $request->id,
                'id_petugas' => $request->id_petugas,
                'nama' => $request->nama,
                'username' => $request->username,
                'level' => $request->level,
                'telp' => $request->telp,
            ]);
        }else{
        $upd->update([
            'id' => $request->id,
            'id_petugas' => $request->id_petugas,
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'level' => $request->level,

            'telp' => $request->telp,
        ]);
        }
        if($upd){
        Alert::success('Ubah Data', 'data petugas berhasil diubah');
        return redirect('/admin/petugas');
        }else{
        Alert::success('Ubah Data', 'data petugas berhasil diubah');
        return redirect('/admin/petugas');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
            //return dd($id);
            $del=Petugas::find($id);
            $del->delete(); //perintah untuk hapus
            if($del){
            Alert::success('Hapus Data', 'data petugas berhasil dihapus');
            return redirect('/admin/petugas');
            }else{
            //redirect dengan pesan error
            Alert::error('Hapus Data', 'data petugas gagal dihapus');
            return redirect('/admin/petugas');
            }
    }
}