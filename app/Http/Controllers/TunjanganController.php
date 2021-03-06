<?php

namespace App\Http\Controllers;

use Request;
use App\jabatan;
use App\golongan;
use App\tunjangan;
use Validator;
use Input;
use Alert;
class TunjanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        
        $this->middleware('SA');
    }
    public function index()
    {
        $tunjangan = tunjangan::with('jabatan')->get();
        $tunjangan = tunjangan::with('golongan')->get();
        $tunjangan = tunjangan::all();
        return view('tunjangan.index',compact('tunjangan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = jabatan::all();
        $golongan = golongan::all();
        return view('tunjangan.create',compact('jabatan','golongan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $tunjangan = Request::all();
        $rules = ['kode_tunjangan'  => 'required|unique:tunjangans',
            'jabatan_id' => 'required',
            'golongan_id' => 'required',
            'status' => 'required',
            'jumlah_anak' => 'required|numeric',
            'besaran_uang' => 'required|numeric',
            'besaran_uang' => 'required|numeric|min:1'];
        $sms = ['kode_tunjangan.required' => 'Harus Diisi',
                'kode_tunjangan.unique' => 'Data Sudah Ada',
                'jumlah_anak.numeric' => 'Harus Angka',
                'besaran_uang.numeric' => 'Harus Angka',
                'jabatan_id.required' => 'Harus Diisi',
                'golongan_id.required' => 'Harus Diisi',
                'status.required' => 'Harus Diisi',
                'jumlah_anak.required' => 'Harus Diisi',
                'besaran_uang.required' => 'Harus Diisi',
                'besaran_uang.min' => 'Angka Tidak Valid'
                ];
        $valid=Validator::make(Input::all(),$rules,$sms);
        if ($valid->fails()) {

            alert()->error('Data Gagal Disimpan !!!');  
            return redirect('tunjangan/create')
            ->withErrors($valid)
            ->withInput();
        }
        else
        {
        alert()->success('Data Berhasil Disimpan');
        tunjangan::create($tunjangan);
        return redirect('tunjangan');
        }
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
        $tunjangan=tunjangan::find($id);
        $jabatan=jabatan::all();
        $golongan=golongan::all();
        return view('tunjangan.edit',compact('tunjangan','jabatan','golongan'));
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
        $update = Request::all();
            $tunjangan=tunjangan::find($id);
            $tunjangan->update($update);
            return redirect('tunjangan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tunjangan::find($id)->delete();
        alert()->success('Data Terhapus');
        return redirect('tunjangan');
    }
}
