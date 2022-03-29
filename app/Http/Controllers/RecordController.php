<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Formulir;
use App\Models\Dokter;
use App\Models\Pasien;
 
class RecordController extends Controller
{
    public function index()
    {
        return view('form', [
            "title" => "Formulir Rekam Medis | Medicotic",
            "pasiens" => Pasien::all(), 
            "dokters" => Dokter::all(),
            "formulir" => Formulir::all(),
        ]);
    }

    public function record()
    {
        return view('record', [
            "title" => "Formulir Pengisian Rekam Medis | Medicotic",
            "pasiens" => Pasien::all(), 
            "dokters" => Dokter::all(),
            "formulir" => Formulir::all(),
        ]);
    }
 
    public function proses(Request $request)
    {
        $messagesError = [
            'resep' => ':attribute harus berekstensi .png/ .jpg/ .jpeg dan berukuran maksimal 2 MB!',
            'resep.mimes' => ':attribute harus berekstensi .png/ .jpg/ ataupun .jpeg!',
            //'resep.max' => ':attribute harus berukuran maksimal 2 MB!',
            'required' => ':attribute ini wajib diisi!',
            'min' => ':attribute harus berisi minimal :min karakter!',
            'max' => ':attribute harus berisi maksimal :max karakter!',
            'suhu.between' => ':attribute harus berisi maksimal :between!',
        ];
        
        $this->validate($request,[
            'pasien'=> 'required',
            'dokter' => 'required',
            'kondisi' => 'required|min:5|max:100',
            'suhu' => 'required|numeric|between:35,45.5',
            'resep' => 'required|mimes:png,jpg,jpeg|max:2048',
        ], $messagesError);

        session()->flash('success','Formulir Rekam Medis Berhasil Dibuat!');
        
        $img = $request->file('resep');
        $direktoriTujuan = 'resep/';
        $direktoriGambar = $img->getClientOriginalName();
        $img->move($direktoriTujuan, $direktoriGambar);
 		
        return view('record-success',['data' => $request]);
    }

    public function content(Formulir $formulir){
        return view('konten', [
            "formulir" => $formulir
        ]);
    }
}   