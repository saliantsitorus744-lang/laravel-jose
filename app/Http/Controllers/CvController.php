<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CvController extends Controller
{
    public function index()
    {
        $dataCv = Biodata::latest()->get();
        return view('admin.cv.index', compact('dataCv'));
    }

    public function create()
    {
        return view('admin.cv.form', ['cv' => new Biodata()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'         => 'required|string|max:150',
            'nim'          => 'required|string|max:30',
            'kelas'        => 'required|string|max:50',
            'email'        => 'nullable|email|max:150',
            'no_hp'        => 'nullable|string|max:30',
            'alamat'       => 'nullable|string|max:255',
            'tentang_saya' => 'nullable|string|max:2000',
            'pendidikan'   => 'nullable|string|max:2000',
            'pengalaman'   => 'nullable|string|max:3000',
            'keahlian'     => 'nullable|string|max:2000',
            'foto'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('cv-photos', 'public');
        }

        $cv = Biodata::create($data);

        return redirect()->route('cv.show', $cv->id)->with('success', 'Data CV berhasil disimpan!');
    }

    public function show(Biodata $cv)
    {
        return view('admin.cv.show', compact('cv'));
    }

    public function edit(Biodata $cv)
    {
        return view('admin.cv.form', compact('cv'));
    }

    public function update(Request $request, Biodata $cv)
    {
        $data = $request->validate([
            'nama'         => 'required|string|max:150',
            'nim'          => 'required|string|max:30',
            'kelas'        => 'required|string|max:50',
            'email'        => 'nullable|email|max:150',
            'no_hp'        => 'nullable|string|max:30',
            'alamat'       => 'nullable|string|max:255',
            'tentang_saya' => 'nullable|string|max:2000',
            'pendidikan'   => 'nullable|string|max:2000',
            'pengalaman'   => 'nullable|string|max:3000',
            'keahlian'     => 'nullable|string|max:2000',
            'foto'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($cv->foto) {
                Storage::disk('public')->delete($cv->foto);
            }
            $data['foto'] = $request->file('foto')->store('cv-photos', 'public');
        }

        $cv->update($data);

        return redirect()->route('cv.show', $cv->id)
            ->with('success', 'Data CV berhasil diperbarui.');
    }

    public function destroy(Biodata $cv)
    {
        if ($cv->foto) {
            Storage::disk('public')->delete($cv->foto);
        }

        $cv->delete();

        return redirect()->route('cv.index')->with('success', 'Data CV berhasil dihapus.');
    }
}
