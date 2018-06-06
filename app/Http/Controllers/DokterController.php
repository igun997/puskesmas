<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DokterModel;
class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datadokter = DokterModel::all();
        return view('dokter',['title' => "Dokter",'datadokter'=>$datadokter]);
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
        $DokterModel = new DokterModel();
        $DokterModel->kd_dokter = $this->kodeOtomatis();
        $DokterModel->nama_dokter = $request->nama_dokter;
        $DokterModel->alamat = $request->alamat;
        $DokterModel->spesialis = $request->spesialis;

        $DokterModel->save();
        return response()->json($DokterModel);
    }

    public function kodeOtomatis(){
        $nilaiMax = DokterModel::max('kd_dokter');
        
        $pecah = substr($nilaiMax, 1,4)+1;
        $no_urut = sprintf("%'.04d",$pecah);
        return "D".$no_urut;
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
         $DokterModel = DokterModel::where('kd_dokter',$id)->update(['nama_dokter' => $request->nama_dokter,'alamat' => $request->alamat,'spesialis' => $request->spesialis]);

        return response()->json($DokterModel);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $DokterModel = DokterModel::where('kd_dokter',$id);
        $DokterModel->delete();

        return response()->json($DokterModel);
    }
}
