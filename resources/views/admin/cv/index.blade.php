@extends('admin.cv.layout')
@section('title', 'Data CV | CV Studio')
@section('content')
<div class="panel">
    <div class="eyebrow">Dashboard · Curriculum Vitae</div>
    <h1>Kelola CV kamu.</h1>
    <p class="muted">Tambahkan biodata, buat CV otomatis, lalu lihat, edit, atau hapus datanya.</p>
    <div style="display:flex;gap:10px;flex-wrap:wrap;margin-top:20px">
        <a href="{{ route('cv.create') }}" class="btn btn-primary">+ Input Biodata & Buat CV</a>
    </div>
    <div class="table-wrap">
        <table>
            <thead><tr><th>Nama</th><th>NIM</th><th>Kelas</th><th>Email</th><th>Aksi</th></tr></thead>
            <tbody>
            @forelse($dataCv as $item)
                <tr>
                    <td><strong>{{ $item->nama }}</strong></td>
                    <td>{{ $item->nim }}</td>
                    <td>{{ $item->kelas }}</td>
                    <td>{{ $item->email ?: '—' }}</td>
                    <td>
                        <div class="actions">
                            <a class="btn btn-primary" href="{{ route('cv.show', $item->id) }}">Lihat CV</a>
                            <a class="btn btn-light" href="{{ route('cv.edit', $item->id) }}">Edit</a>
                            <form method="POST" action="{{ route('cv.destroy', $item->id) }}" onsubmit="return confirm('Yakin ingin menghapus data CV ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger" type="submit">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5"><div class="empty"><h3>Belum ada data CV</h3><p>Isi formulir pertama untuk membuat CV.</p><a href="{{ route('cv.create') }}" class="btn btn-primary">Mulai Input Biodata</a></div></td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
