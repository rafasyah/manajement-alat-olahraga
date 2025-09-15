<?php

namespace App\Http\Controllers;
use App\Models\Alat;
use Illuminate\Http\Request;

class AlatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alats = Alat::all();
        return view('alat.index', compact('alats'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomor' => 'required|unique:alats,nomor',
            'nama_barang' => 'required|string|max:255',
            'status_barang' => 'required|string|max:100',
            'gambar_barang' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'jumlah_barang' => 'required|integer|min:1',
        ]);
        if ($request->hasFile('gambar_barang')) {
            $imageName = time().'.'.$request->gambar_barang->extension();
            $request->gambar_barang->move(public_path('images'), $imageName);
            $validatedData['gambar_barang'] = $imageName;
        }
        Alat::create($validatedData);
        return redirect()->route('alat.index')->with('success', 'Alat tambah sukses!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('alat.show', [
            'alat' => Alat::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('alat.edit', [
            'alat' => Alat::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nomor' => 'required|unique:alats,nomor,' . $id,
            'nama_barang' => 'required|string|max:255',
            'status_barang' => 'required|string|max:100',
            'gambar_barang' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'jumlah_barang' => 'required|integer|min:1',
        ]);
        $alats = Alat::findOrFail($id);
        if ($request->hasFile('gambar_barang')) {
            $imageName = time().'.'.$request->gambar_barang->extension();
            $request->gambar_barang->move(public_path('images'), $imageName);
            $validatedData['gambar_barang'] = $imageName;
        }
        $alats->update($validatedData);
        return redirect()->route('alat.index')->with('success', 'Alat di update sukses!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $alats = Alat::findOrFail($id);
        $alats->delete();
        return redirect()->route('alat.index')->with('success', 'Alat di hapus sukses!');
    }
}
