<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Input;
use Validator;
use Response;
use App\PasienModel;
use View;


class PasienController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {      
        $pasien = PasienModel::all();
        $totalpasien = PasienModel::count();
        $pasienbelumperiksa = PasienModel::where('penyakit_pasien','Belum Diperiksa')->count();
        $sudahperiksa = $totalpasien - $pasienbelumperiksa;

        if($totalpasien > 0){
            $persentaseB = ($pasienbelumperiksa / $totalpasien) * 100;
            $persentaseS = ($sudahperiksa / $totalpasien) * 100;
        }else{
            $persentaseB = 0;
            $persentaseS = 0;
        }
        return view('pasien',['datapasien' => $pasien, 'title' => "Pasien", 'totalpasien'=>$totalpasien,'pasienbelumperiksa' => $pasienbelumperiksa, 'sudahperiksa'=>$sudahperiksa,'persentaseB' => $persentaseB, 'persentaseS' => $persentaseS]);
    }

    public function kodeOtomatis(){
        $nilaiMax = PasienModel::max('kd_pasien');
        
        $pecah = substr($nilaiMax, 1,4)+1;
        $no_urut = sprintf("%'.04d",$pecah);
        return "P".$no_urut;
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
        $PasienModel = new PasienModel();
        $PasienModel->kd_pasien = $this->kodeOtomatis();
        $PasienModel->nama_pasien = $request->nama_pasien;
        $PasienModel->alamat = $request->alamat;
        $PasienModel->penyakit_pasien = "Belum Diperiksa";
        $PasienModel->tgl_berobat = Date('Y-m-d');
        $PasienModel->save();
        return response()->json($PasienModel);
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
         $PasienModel = PasienModel::where('kd_pasien',$id)->update(['nama_pasien' => $request->nama_pasien,'alamat' => $request->alamat]);


        // $PasienModel->nama_pasien = $request->nama_pasien;   
        // $PasienModel->alamat = $request->alamat;
        // $PasienModel->save();
        return response()->json($PasienModel);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kd_pasien)
    {
        $PasienModel = PasienModel::where('kd_pasien',$kd_pasien);
        $PasienModel->delete();

        return response()->json($PasienModel);
    }
}
