<?php

namespace App\Http\Controllers;

use App\Models\Zakat;
use App\Models\Donatur;
use Illuminate\Http\Request;

class ZakatController extends Controller
{
    public function index()
    {
        $zakats = Zakat::with('donatur')->get(); // relasi benar: donatur
        return view('zakats.index', compact('zakats'));
    }

    public function create()
    {
        $donaturs = Donatur::where('jenis', 'muzakki')->get();
        return view('zakats.create', compact('donaturs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'donatur_id' => 'required|exists:donaturs,id',
            'tanggal'    => 'required|date',
            'jenis'      => 'required|in:fitrah,maal,profesi,lainnya',
            'jumlah'     => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        Zakat::create($request->all());

        return redirect()->route('zakats.index')->with('success', 'Zakat berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $zakat = Zakat::findOrFail($id);
        $donaturs = Donatur::where('jenis', 'muzakki')->get();
        return view('zakats.edit', compact('zakat', 'donaturs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'donatur_id' => 'required|exists:donaturs,id',
            'jenis'      => 'required|in:fitrah,maal,profesi,lainnya', // benar: jenis, bukan jenis_zakat
            'tanggal'    => 'required|date',
            'jumlah'     => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        $zakat = Zakat::findOrFail($id);
        $zakat->update($request->all());

        return redirect()->route('zakats.index')->with('success', 'Zakat berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $zakat = Zakat::findOrFail($id);
        $zakat->delete();

        return redirect()->route('zakats.index')->with('success', 'Zakat berhasil dihapus.');
    }
}
