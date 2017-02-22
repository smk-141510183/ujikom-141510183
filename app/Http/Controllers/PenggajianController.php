<?php

namespace App\Http\Controllers;

use Request;
use DB;
use App\lembur_pegawai;
use App\tunjangan_pegawai;
use App\pegawai;
use App\tunjangan;
use App\penggajian;
use App\jabatan;
use App\kategori_lembur;
use App\golongan;
use App\User;
class PenggajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('SA');
    }
    public function index()
    {
        $penggajian = penggajian::with('tunjangan_pegawai')->get();
        $tunjangan_pegawai = tunjangan_pegawai::with('pegawai')->get();
        $pegawai = pegawai::with('User')->get();
        $users = User::all();
        $penggajian = penggajian::all();
        
        return view('penggajian.index',compact('penggajian','users','pegawai','tunjangan_pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     $pegawai = pegawai::with('User')->get();
     return view('penggajian.create',compact('pegawai','tunjangan_pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $penggajian = Request::all();
        $tunjangan_pegawai = tunjangan_pegawai::all();
        $user = $penggajian['pegawai_id'];
        $jumlah_jam_lembur = DB::table('lembur_pegawais')
        ->where('lembur_pegawais.pegawai_id', '=', $user)
        ->sum('lembur_pegawais.jumlah_jam');
        $tunjangan_pegawai = tunjangan_pegawai::where('pegawai_id',$penggajian['pegawai_id'])->first();
        $pegawai = pegawai::where('id',$penggajian['pegawai_id'])->first();
        $kategori_lembur = kategori_lembur::where('jabatan_id',$pegawai->jabatan_id)->where('golongan_id',$pegawai->golongan_id)->first();
        $jabatan = jabatan::where('id',$pegawai->jabatan_id)->first();
        $golongan = golongan::where('id',$pegawai->golongan_id)->first();
        $lembur_pegawai = lembur_pegawai::where('pegawai_id',$penggajian['pegawai_id'])->first();
        $gaji_pokok = jabatan::where('besaran_uang')->first();
        $tunjangan = tunjangan::where('id',$tunjangan_pegawai->kode_tunjangan_id)->first();
        $penggajian['tunjangan_pegawai_id']= $tunjangan_pegawai->id;
        $penggajian['jumlah_jam_lembur']= (int)$jumlah_jam_lembur;
        $penggajian['jumlah_uang_lembur']= $kategori_lembur->besaran_uang*(int)$jumlah_jam_lembur;
        $penggajian['gaji_pokok']= $jabatan->besaran_uang+$golongan->besaran_uang;
        $penggajian['total_gaji']= $penggajian['gaji_pokok']+$penggajian['jumlah_uang_lembur']+$tunjangan->besaran_uang;
        penggajian::create($penggajian);
        return redirect('penggajian');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
