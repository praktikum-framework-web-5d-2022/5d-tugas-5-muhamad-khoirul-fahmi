<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PembeliController extends Controller
{
    public function index()
    {
        $pembelis = Pembeli::get();
        return view('pembeli.index', ['pembelis' => $pembelis]);
    }

    public function create()
    {
        return view('pembeli.create');
    }

    public function store(Request $request)
    {
        $validatepembeli = $request->validate([
            'nama_pembeli' => 'required|min:3',
            'alamat' => 'required|min:10'
        ]);
        $barang = $request->validate([
            'kode_barang' => 'required|numeric',
            'nama_barang' => 'required|min:3',
            'jumlah_barang' => 'required|numeric',
        ]);

        $pembeli = Pembeli::create($validatepembeli);
        $pembeli->barang()->create($barang);
        return redirect()->route('pembeli.index')->with('message', "Data pembeli {$validatepembeli['nama_pembeli']} berhasil ditambahkan");
    }

    public function destroy(Pembeli $pembeli)
    {
        $pembeli->barang()->delete($pembeli->id);
        $pembeli->delete($pembeli->id);
        return redirect()->route('pembeli.index')->with('message', "Data pembeli $pembeli->nama_pembeli berhasil dihapus");
    }

    public function edit(Pembeli $pembeli)
    {
        return view('pembeli.edit', ['pembeli' => $pembeli]);
    }

    public function update(Request $request, Pembeli $pembeli)
    {
        $validatepembeli = $request->validate([
            'nama_pembeli' => 'required|min:3',
            'alamat' => 'required|min:10'
        ]);

        $barang = $request->validate([
            'kode_barang' => 'required|numeric',
            'nama_barang' => 'required|min:3',
            'jumlah_barang' => 'required|numeric',
        ]);

        $pembeli1 = Pembeli::find($pembeli->id);
        $pembeli1->update($validatepembeli);
        $pembeli1->barang()->update($barang);

        return redirect()->route('pembeli.index')->with('message', "Data pembeli $pembeli->nama_pembeli berhasil diubah");
    }
}
