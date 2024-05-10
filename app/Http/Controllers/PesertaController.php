<?php

namespace App\Http\Controllers;

use App\Exports\PesertaExport;
use App\Models\Toko;
use App\Models\Kota;
use App\Models\Regional;
use Illuminate\Http\Request;
use App\Models\Peserta;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class PesertaController extends Controller
{
    public function index()
    {
        return view('peserta');
    }

    public function insert(Request $request)
    {
        $rules = [
            'kota' => 'required',
            'toko' => 'required',
            'nama_peserta' => 'required',
            'tanggal_lahir' => 'required',
            'kategori_peserta' => 'required'
        ];

        $isValid = Validator::make($request->all(),$rules);

        if($isValid->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $isValid->errors()
            ]);
        }else{
            $peserta = new Peserta;
            $peserta->id_kota = $request->input('kota');
            $peserta->id_toko = $request->input('toko');
            $peserta->nama_peserta = $request->input('nama_peserta');
            $peserta->tanggal_lahir = $request->input('tanggal_lahir');
            $peserta->kategori_peserta = $request->input('kategori_peserta');
            $peserta->nama_wali = $request->input('nama_wali');
            $peserta->nomor_handphone_wali = $request->input('nomor_handphone_wali');
            if($peserta->save()){
                return response([
                    'status' => 200,
                    'data' => Peserta::with(['kota','toko'])->find($peserta->id),
                    'message' => 'Berhasil menyimpan data peserta!'
                ]);
            }else{
                return response([
                    'status' => 500,
                    'message' => 'Gagal menyimpan data peserta!'
                ]);
            }
        }
    }

    public function kota()
    {
        $kota = Regional::get();
        return response([
            'status' => 200,
            'result' => $kota
        ]);
    }

    public function toko($kota)
    {
        $toko = Toko::where('id_regional', $kota)->get();
        return response([
            'status' => 200,
            'result' => $toko
        ]);
    }

    public function getDataPeserta($regional, $toko)
    {
        $data = Peserta::with(['regional','toko'])
            ->where(['id_kota' => $regional, 'id_toko' => $toko])->get();
        return response([
            'status' => 200,
            'data' => $data
        ]);
    }

    public function cekDuplicate(Request $request,$regional,$toko)
    {
        $peserta = Peserta::where([
            'nama_peserta' => $request->input('nama_peserta'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'id_kota' => $regional,
            'id_toko' => $toko
        ])->get();
        if($peserta->count() > 0){
            return response()->json([
                'status' => 400,
                'message' => 'Peserta sudah terdaftar'
            ]);
        }else{
            return response()->json([
                'status' => 200,
                'message' => 'Peserta tersedia!'
            ]);
        }
    }

    public function exportDataPeserta()
    {
        $date = date('Y-m-d H:i');
        return Excel::download(new PesertaExport, 'Data Peserta - '.$date.'.xlsx');
    }
}
