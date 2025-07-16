<?php

namespace App\Http\Controllers;

use App\Models\Donatur;
use Illuminate\Http\Request;

class DonaturController extends Controller
{
    // Tampilkan semua data donatur/muzakki
    public function index()
    {
        $donaturs = Donatur::all();
        return view('donaturs.index', compact('donaturs'));
    }

    // Form tambah donatur
    public function create()
    {
        return view('donaturs.create');
    }

    // Simpan data donatur baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'jenis' => 'required|in:donatur,muzakki',
            'catatan' => 'nullable|string',
        ]);

        Donatur::create($request->all());

        return redirect()->route('donaturs.index')->with('success', 'Data berhasil ditambahkan.');
    }

    // Form edit donatur
    public function edit($id)
    {
        $donatur = Donatur::findOrFail($id);
        return view('donaturs.edit', compact('donatur'));
    }

    // Update donatur
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'jenis' => 'required|in:donatur,muzakki',
            'catatan' => 'nullable|string',
        ]);

        $donatur = Donatur::findOrFail($id);
        $donatur->update($request->all());

        return redirect()->route('donaturs.index')->with('success', 'Data berhasil diperbarui.');
    }

    // Hapus donatur
    public function destroy($id)
    {
        $donatur = Donatur::findOrFail($id);
        $donatur->delete();

        return redirect()->route('donaturs.index')->with('success', 'Data berhasil dihapus.');
    }
}
