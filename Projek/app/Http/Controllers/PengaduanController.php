<?php

namespace App\Http\Controllers;

use App\Models\pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengaduan = pengaduan::all();
        return view('cust.pengaduan.tampil', compact('pengaduan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cust.formPengaduan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'isi'  => 'required|string',
            'foto' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $user = Auth::user();

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('foto', 'public');
        }

        Pengaduan::create([
            'user_id'      => $user->id,
            'nama_pengadu' => $user->name,
            'email'        => $user->email,
            'no_telp'      => $user->no_telp,
            'isi'          => $request->isi,
            'foto'         => $fotoPath,
        ]);

        return redirect()->route('cust.index')->with('success', 'Pengaduan berhasil dikirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show(pengaduan $pengaduan)
    {
        return view('cust.pengaduan.show', compact('pengaduan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pengaduan $pengaduan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pengaduan $pengaduan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pengaduan $pengaduan)
    {
        //
    }
}
