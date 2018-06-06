<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdministrasiModel;

class AdministrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataadministrasi = AdministrasiModel::all();
        return view('administrasi',['title'=>"Administrasi",'dataadministrasi'=>$dataadministrasi]);
    }

    public function kodeOtomatis(){
        $nilaiMax = AdministrasiModel::max('kd_petugas');
        
        $pecah = substr($nilaiMax, 1,4)+1;
        $no_urut = sprintf("%'.04d",$pecah);
        return "A".$no_urut;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $AdministrasiModel = new AdministrasiModel();
        $AdministrasiModel->kd_petugas = $this->kodeOtomatis();
        $AdministrasiModel->nama_petugas = $request->nama_petugas;
        $AdministrasiModel->alamat_petugas = $request->alamat_petugas;
        $AdministrasiModel->jam_jaga = $request->jam_jaga;
        $AdministrasiModel->save();
        return response()->json($AdministrasiModel);
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
         $AdministrasiModel = AdministrasiModel::where('kd_petugas',$id)->update(['nama_petugas' => $request->nama_petugas,'alamat_petugas' => $request->alamat_petugas,'jam_jaga' => $request->jam_jaga]);


        // $AdministrasiModel->nama_pasien = $request->nama_pasien;   
        // $AdministrasiModel->alamat = $request->alamat;
        // $AdministrasiModel->save();
        return response()->json($AdministrasiModel);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $AdministrasiModel = AdministrasiModel::where('kd_petugas',$id);
        $AdministrasiModel->delete();

        return response()->json($AdministrasiModel);
    }
}
