<?php

namespace App\Http\Controllers;

use Request;
use App\jabatan;
use App\golongan;
use App\kategori_lembur;
use Input;
use Validator;
class KategoriLemburController extends Controller
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
        $kategori_lembur = kategori_lembur::with('jabatan')->get();
        $kategori_lembur = kategori_lembur::with('golongan')->get();
        $kategori_lembur = kategori_lembur::all();
        return view('kategorilembur.index',compact('kategori_lembur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $golongan = golongan::all();
        $jabatan = jabatan::all();
        return view('kategorilembur.create',compact('golongan','jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $jabatan = jabatan::all();
        // $golongan = golongan::all();
        $kategori_lembur = Request::all();
        $rules = ['kode_lembur' => 'required|unique:kategori_lemburs',
                  'jabatan_id' => 'required',
                  'golongan_id' => 'required',
                  'besaran_uang' => 'required|numeric',
                  'besaran_uang' => 'required|numeric|min:1'
                  ];
        $sms = ['kode_lembur.required' => 'Harus Diisi',
                'kode_lembur.unique' => 'Data Sudah Ada',
                'jabatan_id.required' => 'Harus Diisi',
                'golongan_id.required' => 'Harus Diisi',
                'besaran_uang.required' => 'Harus Diisi',
                'besaran_uang.numeric' => 'Harus Angka',
                'besaran_uang.min' => 'Angka Tidak Valid'];
        $valid=Validator::make(Input::all(),$rules,$sms);
        if ($valid->fails()) {

            alert()->error('Data Gagal Disimpan !!!');  
            return redirect('kategorilembur/create')
            ->withErrors($valid)
            ->withInput();
        }
        else
        {
        // $data = kategori_lembur::where('id',$kategori_lembur['jabatan_id'])->first();
        // $data1 = kategori_lembur::where('id',$kategori_lembur['golongan_id'])->first();
        //  $check = kategori_lembur::where('jabatan_id',$data->jabatan_id)->where('golongan_id',$data1->golongan_id)->first();
        //     if(isset($check) ){
        //     alert()->error('Kategori Sudah Ada');
        //     // dd($missing_count);
        //     return view('kategorilembur.create',compact('data','data1','check','jabatan','golongan'));
        // }
        alert()->success('Data Berhasil Disimpan');
        kategori_lembur::create($kategori_lembur);
        return redirect('kategorilembur');
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
        $kategorilembur=kategori_lembur::find($id);
        $golongan=golongan::all();
        $jabatan=jabatan::all();
        return view('kategorilembur.edit',compact('kategorilembur','golongan','jabatan')) ;
        
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
            $kategorilembur=kategori_lembur::find($id);
            $kategorilembur->update($update);
            return redirect('kategorilembur');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        kategori_lembur::find($id)->delete();
        alert()->success('Data Terhapus');
        return redirect('kategorilembur');
    }
}
