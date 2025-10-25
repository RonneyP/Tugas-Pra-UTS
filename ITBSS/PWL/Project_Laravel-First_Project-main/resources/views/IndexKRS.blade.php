<!DOCTYPE html>
<html>
<head>
    <title>KRS Mahasiswa</title>
</head>
<body>
    <h2>KRS {{ $mahasiswa->name }}</h2>
    <p>Total SKS: {{ $mahasiswa->totalSks() }} / {{ $mahasiswa->maksimal_sks }}</p>

    {{-- Notifikasi --}}
    @if (session('success'))
        <div style="color: green">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div style="color: red">{{ session('error') }}</div>
    @endif

    <hr>

    <h3>Tambah Mata Kuliah</h3>
    <form action="{{ route('krs.store', $mahasiswa->id) }}" method="POST">
        @csrf
        <select name="matakuliah_id" required>
            <option value="">-- Pilih Mata Kuliah --</option>
            @foreach ($matakuliah as $mk)
                <option value="{{ $mk->id }}">
                    {{ $mk->namamk }} ({{ $mk->sks }} SKS)
                </option>
            @endforeach
        </select>
        <button type="submit">Tambah</button>
    </form>

    <hr>

    <h3>Mata Kuliah yang Diambil</h3>
    <table border="1" cellpadding="5">
        <tr>
            <th>Nama Mata Kuliah</th>
            <th>SKS</th>
            <th>Aksi {{ $mahasiswa->matakuliah->count() }}</th>
        </tr>
        @forelse ($mahasiswa->matakuliah as $mk)
            <tr>
                <td>{{ $mk->namamk }}</td>
                <td>{{ $mk->sks }}</td>
                <td>
                    <form action="{{ route('krs.destroy', [$mahasiswa->id, $mk->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Belum ada mata kuliah yang diambil</td>
            </tr>
        @endforelse
    </table>
</body>
</html>
