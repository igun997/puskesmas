<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RuanganModel;


class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $dataruangan = RuanganModel::all();
        return view('ruangan',['title'=>"Ruangan",'dataruangan'=>$dataruangan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kodeOtomatis(){
        $nilaiMax = RuanganModel::max('kd_ruangan');
        
        $pecah = substr($nilaiMax, 1,4)+1;
        $no_urut = sprintf("%'.04d",$pecah);
        return "R".$no_urut;
    }



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
        $RuanganModel = new RuanganModel();
        $RuanganModel->kd_ruangan = $this->kodeOtomatis();
        $RuanganModel->nama_ruangan = $request->nama_ruangan;
        $RuanganModel->nama_gedung = $request->nama_gedung;
        $RuanganModel->save();
        return response()->json($RuanganModel);
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
         $RuanganModel = RuanganModel::where('kd_ruangan',$id)->update(['nama_ruangan' => $request->nama_ruangan,'nama_gedung' => $request->nama_gedung]);


        // $RuanganModel->nama_pasien = $request->nama_pasien;   
        // $RuanganModel->alamat = $request->alamat;
        // $RuanganModel->save();
        return response()->json($RuanganModel);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $RuanganModel = RuanganModel::where('kd_ruangan',$id);
        $RuanganModel->delete();

        return response()->json($RuanganModel);
    }
}
