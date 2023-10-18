<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Petugas;
use Illuminate\Support\Facades\Validator;


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
        return redirect('/admin/petugas')->with(['success'=> 'Data Sukses

        Disimpan']);
        }else{
            //redirect dengan pesan error
        return redirect('/admin/petugas')->with(['error' => 'Data Gagal

        Disimpan!']);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
