<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use App\Models\Donatur;
use Illuminate\Http\Request;

class DonasiController extends Controller
{
    // Tampilkan semua donasi
    public function index()
    {
        $donasis = Donasi::with('donatur')->get();
        return view('donasis.index', compact('donasis'));
    }

    // Form tambah donasi
    public function create()
    {
        $donaturs = Donatur::where('jenis', 'donatur')->get();
        return view('donasis.create', compact('donaturs'));
    }

    // Simpan data donasi baru
    public function store(Request $request)
    {
        $request->validate([
             'donatur_id' => 'required|exists:donaturs,id',
        'tanggal' => 'required|date',
        'jenis' => 'required|string',
        'jumlah' => 'required|numeric',
        'keterangan' => 'nullable|string',
        ]);

        Donasi::create($request->all());
        return redirect()->route('donasis.index')->with('success', 'Donasi berhasil ditambahkan.');
    }

    // Form edit donasi
    public function edit($id)
    {
        $donasi = Donasi::findOrFail($id);
        $donaturs = Donatur::where('jenis', 'donatur')->get();
        return view('donasis.edit', compact('donasi', 'donaturs'));
    }

    // Update donasi
    public function update(Request $request, $id)
    {
        $request->validate([
            'donatur_id' => 'required|exists:donaturs,id',
            'tanggal' => 'required|date',
            'jenis' => 'required|in:tunai,transfer,barang',
            'jumlah' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        $donasi = Donasi::findOrFail($id);
        $donasi->update($request->all());

        return redirect()->route('donasis.index')->with('success', 'Donasi berhasil diperbarui.');
    }

    // Hapus donasi
    public function destroy($id)
    {
        $donasi = Donasi::findOrFail($id);
        $donasi->delete();

        return redirect()->route('donasis.index')->with('success', 'Donasi berhasil dihapus.');
    }
}
