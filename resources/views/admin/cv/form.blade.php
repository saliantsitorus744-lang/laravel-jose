@extends('admin.cv.layout')
@section('title', isset($cv->id) ? 'Edit Biodata CV' : 'Input Biodata CV')
@section('content')
<div class="panel">
    <div class="eyebrow">Langkah 01 · Data diri</div>
    <h1>{{ isset($cv->id) ? 'Edit biodata kamu' : 'Buat CV pertamamu' }}</h1>
    <p class="muted">Lengkapi formulir di bawah. Setelah disimpan, kamu langsung diarahkan ke tampilan CV.</p>

    @if($errors->any())
        <div class="alert" style="background:#fff0ed;color:#a82920">
            <strong>Periksa kembali inputan:</strong>
            <ul style="margin-bottom:0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form method="POST" action="{{ isset($cv->id) ? route('cv.update', $cv->id) : route('cv.store') }}" enctype="multipart/form-data">
        @csrf
        @if(isset($cv->id)) @method('PUT') @endif

        <div class="grid">
            <div class="field">
                <label for="nama">Nama lengkap *</label>
                <input id="nama" name="nama" value="{{ old('nama', $cv->nama ?? '') }}" required maxlength="150" placeholder="Nama Lengkap>
            </div>
            <div class="field">
                <label for="nim">NIM *</label>
                <input id="nim" name="nim" value="{{ old('nim', $cv->nim ?? '') }}" required maxlength="30" placeholder="NIM">
            </div>
            <div class="field">
                <label for="kelas">Kelas *</label>
                <input id="kelas" name="kelas" value="{{ old('kelas', $cv->kelas ?? '') }}" required maxlength="50" placeholder="Kelas">
            </div>
            <div class="field">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email', $cv->email ?? '') }}" maxlength="150" placeholder="nama@email.com">
            </div>
            <div class="field">
                <label for="no_hp">Nomor HP</label>
                <input id="no_hp" name="no_hp" value="{{ old('no_hp', $cv->no_hp ?? '') }}" maxlength="30" placeholder="08xxxxxxxxxx">
            </div>
            <div class="field">
                <label for="alamat">Alamat</label>
                <input id="alamat" name="alamat" value="{{ old('alamat', $cv->alamat ?? '') }}" maxlength="255" placeholder="Kota / alamat domisili">
            </div>
        </div>

        <div class="field">
            <label for="foto">Foto profil (opsional)</label>
            <input id="foto" type="file" name="foto" accept=".jpg,.jpeg,.png,.webp">
            <div class="hint">Format JPG, PNG, atau WEBP; maksimal 2 MB. Untuk menampilkan foto, jalankan php artisan storage:link.</div>
        </div>
        <div class="field">
            <label for="tentang_saya">Tentang saya / ringkasan profil</label>
            <textarea id="tentang_saya" name="tentang_saya" maxlength="2000" placeholder="Ceritakan profil singkatmu...">{{ old('tentang_saya', $cv->tentang_saya ?? '') }}</textarea>
        </div>
        <div class="field">
            <label for="pendidikan">Pendidikan</label>
            <textarea id="pendidikan" name="pendidikan" maxlength="2000" placeholder="Contoh: Politeknik Caltex Riau — Teknik Informatika">{{ old('pendidikan', $cv->pendidikan ?? 'Politeknik Caltex Riau — Teknik Informatika') }}</textarea>
        </div>
        <div class="field">
            <label for="pengalaman">Pengalaman</label>
            <textarea id="pengalaman" name="pengalaman" maxlength="3000" placeholder="Pengalaman kerja, organisasi, proyek, atau kegiatan...">{{ old('pengalaman', $cv->pengalaman ?? '') }}</textarea>
        </div>
        <div class="field">
            <label for="keahlian">Keahlian</label>
            <textarea id="keahlian" name="keahlian" maxlength="2000" placeholder="Contoh: Canva, fotografi, color grading, editing video">{{ old('keahlian', $cv->keahlian ?? 'Desain visual, fotografi, color grading, editing video') }}</textarea>
        </div>
        <div style="display:flex;gap:10px;flex-wrap:wrap">
            <button class="btn btn-primary" type="submit">{{ isset($cv->id) ? 'Simpan Perubahan' : 'Simpan dan Buat CV →' }}</button>
            <a href="{{ route('cv.index') }}" class="btn btn-light">Kembali</a>
        </div>
    </form>
</div>
@endsection
