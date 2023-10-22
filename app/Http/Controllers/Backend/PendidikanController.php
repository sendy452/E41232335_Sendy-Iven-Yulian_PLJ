<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pendidikan;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    public function index(){
        $pendidikan = Pendidikan::get();
        return view('backend.pendidikan.index', compact('pendidikan'));
    }

    public function create(){
        $tingkatan = [
            [
                'id' => 1,
                'name' => 'TK'
            ],
            [
                'id' => 2,
                'name' => 'SD'
            ],
            [
                'id' => 3,
                'name' => 'SMP'
            ],
            [
                'id' => 4,
                'name' => 'SMA/SMK'
            ],
            [
                'id' => 5,
                'name' => 'D3'
            ],
            [
                'id' => 6,
                'name' => 'D4/S1'
            ],
            [
                'id' => 7,
                'name' => 'S2'
            ],
            [
                'id' => 8,
                'name' => 'S3'
            ],
        ];
        return view('backend.pendidikan.create', compact('tingkatan'));
    }

    public function store(Request $request){
        Pendidikan::create($request->all());

        return redirect()->route('pendidikan.index')
                ->with('success', 'Data pendidikan baru telah berhasil disimpan');
    }

    public function edit(Pendidikan $pendidikan){
        $tingkatan = [
            [
                'id' => 1,
                'name' => 'TK'
            ],
            [
                'id' => 2,
                'name' => 'SD'
            ],
            [
                'id' => 3,
                'name' => 'SMP'
            ],
            [
                'id' => 4,
                'name' => 'SMA/SMK'
            ],
            [
                'id' => 5,
                'name' => 'D3'
            ],
            [
                'id' => 6,
                'name' => 'D4/S1'
            ],
            [
                'id' => 7,
                'name' => 'S2'
            ],
            [
                'id' => 8,
                'name' => 'S3'
            ],
        ];
        return view('backend.pendidikan.create', compact('pendidikan', 'tingkatan'));
    }

    public function update(Request $request, Pendidikan $pendidikan){
        $pendidikan->update($request->all());
        return redirect()->route('pendidikan.index')
                ->with('success', 'Pendidikan berhasil diperbarui');
    }

    public function destroy(Pendidikan $pendidikan){
        $pendidikan->delete();
        return redirect()->route('pendidikan.index')
        ->with('success', 'Pendidikan berhasil dihapus');
    }
}
