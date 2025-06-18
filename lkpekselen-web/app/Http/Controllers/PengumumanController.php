<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PengumumanController extends Controller
{
    public function index(){
        $pengumuman = Pengumuman::orderBy('created_at', 'desc')->get();

        // dd($pengumuman->first());

        return view('dashboard.inbox.index', compact('pengumuman'));
    }
    public function create(){
        return view('dashboard.inbox.create');
    }
    public function store(Request $request){
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
        ]);
        Pengumuman::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal_pengumuman' => Carbon::now()->toDateString(),
        ]);

        return redirect()->route('inbox')->with('Success', 'Pengumuman berhasil ditambahkan.');
    }
    public function edit($id){
        $pengumuman = Pengumuman::findOrFail($id);
        return view('dashboard.inbox.edit', compact('pengumuman'));
    }
    public function update(Request $request, $id){
        Validator::make(['id' => $id], [
            'id' => 'required|uuid',
        ])->validate();

        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->update($request->all());

        return redirect()->route('inbox')->with('Success', 'Pengumuman berhasil diupdate.');
    }
    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->delete();

        return redirect()->route('inbox')
            ->with('success', 'Pengumuman berhasil dihapus.');
    }

}
