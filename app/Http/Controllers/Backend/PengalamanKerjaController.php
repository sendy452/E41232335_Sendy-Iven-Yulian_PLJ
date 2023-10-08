<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\{Http\Request, Support\Facades\DB};

class PengalamanKerjaController extends Controller
{
    public function index(){
        $pengalaman_kerja = DB::table('pengalaman_kerja')->get();
        return view('backend.pengalaman_kerja.index', compact('pengalaman_kerja'));
    }

    public function create(){
        return view('backend.pengalaman_kerja.create');
    }

    public function store(Request $request){
        DB::table('pengalaman_kerja')->insert([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar
        ]);

        return redirect()->route('pengalaman_kerja.index')
                        ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id){
        $pengalaman_kerja = DB::table('pengalaman_kerja')->where('id', $id)->first();
        return view('backend.pengalaman_kerja.create', compact('pengalaman_kerja'));
    }

    public function update(Request $request){
        DB::table('pengalaman_kerja')->where('id', $request->id)->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar
        ]);

        return redirect()->route('pengalaman_kerja.index')
                        ->with('success', 'Pengalaman Kerja berhasil diperbarui');
    }
}
