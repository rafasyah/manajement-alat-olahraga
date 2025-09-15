<?php

namespace App\Http\Controllers;
use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    $forms = Form::all();
    return view('dashboard', compact('forms')); // dashboard will list forms
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('form.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_peminjam' => 'required|string|max:255',
            'nama_barang' => 'required|string|max:255',
            'jumlah_barang' => 'required|integer|min:1',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
        ]);

Form::create($validatedData);

        return redirect()->route('home')->with('success', 'Form submitted successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function approve(Request $request, string $id)
    {
        $form = Form::findOrFail($id);
        $form->update(['status_barang' => 0]);
     

        return redirect()->route('dashboard')->with('success', 'Form approved successfully!');
    }
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $form = Form::findOrFail($id);
         $form->delete();
         return redirect()->route('dashboard')->with('success', 'Form deleted successfully!');
    }
}
