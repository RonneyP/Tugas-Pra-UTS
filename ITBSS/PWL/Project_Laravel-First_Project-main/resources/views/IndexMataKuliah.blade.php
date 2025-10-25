<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MataKuliah</title>
    @vite(['resources/js/app.js'])
</head>
<body class="bg-light">

  <div class="container py-5">
    <!-- Judul dan tombol -->
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="fw-bold text-primary">Daftar Mata Kuliah</h2>
      <a href="{{ route('matakuliah.create') }}" class="btn btn-success">
        <i class="bi bi-plus-lg"></i> Create Mata Kuliah
      </a>
    </div>

    <!-- Kartu Tabel -->
    <div class="card shadow">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover table-striped align-middle">
            <thead class="table-dark">
              <tr>
                <th>No</th>
                <th>Kode MK</th>
                <th>Nama MK</th>
                <th>Jurusan</th>
                <th>SKS</th>
                <th>dosen id</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($matakuliah as $index => $matakuliah)
              <tr>
                <td>{{ $matakuliah['id'] }}</td>
                <td>{{ $matakuliah['kodemk'] }}</td>
                <td>{{ $matakuliah['namamk'] }}</td>
                <td>{{ $matakuliah['jurusan'] }}</td>
                <td>{{ $matakuliah['sks'] }}</td>
                <td>{{ $matakuliah->dosen->Nama }}</td>
                <td>
                  <div class="btn-group" role="group">
                    <a href="{{ route('matakuliah.edit', $matakuliah->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('matakuliah.destroy', $matakuliah->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                  </div>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="8" class="text-center text-muted">Belum ada data mahasiswa.</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>

</body>
</html>