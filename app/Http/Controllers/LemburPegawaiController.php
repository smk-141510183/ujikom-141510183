<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;
use App\pegawai;
use App\kategori_lembur;
use App\lembur_pegawai;
use App\jabatan;
use App\User;
use Input;
use Validator;
use Carbon\Carbon;
class LemburPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd($jabatans);
        $lembur_pegawai = lembur_pegawai::with('pegawai')->get();
        $lembur_pegawai = lembur_pegawai::with('kategori_lembur')->get();

        $users = User::all();
        $jabatans = jabatan::all();
        return view('lemburpegawai.index',compact('lembur_pegawai','users','jabatans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori_lembur = kategori_lembur::all();
        $pegawai = pegawai::with('User')->get();
        return view('lemburpegawai.create',compact('kategori_lembur','pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $kategori_lembur = kategori_lembur::all();
        $now = Carbon::now();
        $lembur_pegawai = Request::all();
        $rules = ['pegawai_id' => 'required',
                  'jumlah_jam' => 'required|numeric'];
        $sms = ['pegawai_id.required' => 'Harus Diisi',
                'jumlah_jam.required' => 'Harus Diisi',
                'jumlah_jam.numeric' => 'Harus Angka'];
        $valid=Validator::make(Input::all(),$rules,$sms);
        if ($valid->fails()) {

            alert()->error('Data Salah');  
            return redirect('lemburpegawai/create')
            ->withErrors($valid)
            ->withInput();
        }
        else
        {

        $pegawai = pegawai::where('id',$lembur_pegawai['pegawai_id'])->first();
        $check = kategori_lembur::where('jabatan_id',$pegawai->jabatan_id)->where('golongan_id',$pegawai->golongan_id)->first();
        if(!isset($check)){
            $pegawai = pegawai::with('User')->get();
            $missing_count = true;
            // dd($error_klnf);
            return view('lemburpegawai.create',compact('kategori_lembur','pegawai','missing_count'));
        }

         $pegawai1 = pegawai::where('id',$lembur_pegawai['pegawai_id'])->first();
         $lembur_pegawai1 = lembur_pegawai::where('pegawai_id', $pegawai1->id)->first();
         // dd($lembur_pegawai1->created_at);
            if(isset($lembur_pegawai1->id))
            {
            if($lembur_pegawai1->created_at->day==$now->day)
            {

                return redirect('lemburpegawai/create'.'?errors_match');
            }
            }

        alert()->success('Data Tersimpan');
        $lembur_pegawai['kode_lembur_id'] = $check->id;
        
        lembur_pegawai::create($lembur_pegawai);
        }
        return redirect('lemburpegawai');
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
        $lembur_pegawai = lembur_pegawai::with('kategori_lembur')->get();
        $users = User::all();
        $lembur_pegawai=lembur_pegawai::find($id);
        return view('lemburpegawai.edit',compact('lembur_pegawai','pegawai','users'));
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
        $update = Request::all();
            $lemburpegawai=lembur_pegawai::find($id);
            $lemburpegawai->update($update);
            return redirect('lemburpegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        lembur_pegawai::find($id)->delete();
        alert()->success('Data Terhapus');
        return redirect('lemburpegawai');
    }
}
