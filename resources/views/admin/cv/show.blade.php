@extends('admin.cv.layout')

@section('content')
<div class="cv-sheet">
    <div class="cv-head">
        @if(!empty($cv->foto))
            <img src="{{ asset('storage/' . $cv->foto) }}" alt="Foto {{ $cv->nama }}" class="avatar">
        @else
            <div class="avatar avatar-placeholder">{{ strtoupper(substr($cv->nama ?? 'R', 0, 1)) }}</div>
        @endif
        <div>
            <h1>{{ $cv->nama ?? 'Nama Belum Diisi' }}</h1>
            <p>NIM: {{ $cv->nim ?? '-' }} | Kelas: {{ $cv->kelas ?? '-' }}</p>
            <p>Email: {{ $cv->email ?? '-' }} | HP: {{ $cv->no_hp ?? '-' }}</p>
            <p>Alamat: {{ $cv->alamat ?? '-' }}</p>
        </div>
    </div>

    <div class="cv-body">
        <div class="cv-side">
            <div class="cv-section">
                <h2>Tentang Saya</h2>
                <div class="cv-text">{{ $cv->tentang_saya ?? '-' }}</div>
            </div>
            <div class="cv-section">
                <h2>Keahlian</h2>
                <div class="cv-text">{{ $cv->keahlian ?? '-' }}</div>
            </div>
        </div>
        <div class="cv-main">
            <div class="cv-section">
                <h2>Pendidikan</h2>
                <div class="cv-text">{{ $cv->pendidikan ?? '-' }}</div>
            </div>
            <div class="cv-section">
                <h2>Pengalaman</h2>
                <div class="cv-text">{{ $cv->pengalaman ?? '-' }}</div>
            </div>

            <div class="actions no-print" style="margin-top: 25px;">
                <!-- DIUBAH: 'id' diganti jadi $cv->id langsung -->
                <a href="{{ route('cv.edit', $cv->id) }}" class="btn btn-primary">Edit Biodata</a>
                <button onclick="window.print()" class="btn btn-light">Cetak / Simpan PDF</button>
                <a href="{{ route('cv.index') }}" class="btn btn-light">Kembali ke Data CV</a>
            </div>
        </div>
    </div>
</div>
@endsection
