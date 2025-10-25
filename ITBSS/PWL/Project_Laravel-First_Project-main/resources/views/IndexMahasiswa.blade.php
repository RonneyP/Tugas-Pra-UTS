<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mahasiswa</title>
  @vite(['resources/js/app.js'])
</head>
<body class="bg-light">

  <div class="container py-5">
    <!-- Judul dan tombol -->
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="fw-bold text-primary">Daftar Mahasiswa</h2>
      <a href="{{ route('mahasiswa.create') }}" class="btn btn-success">
        <i class="bi bi-plus-lg"></i> Create Mahasiswa
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
                <th>NIM</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Jurusan</th>
                <th>Angkatan</th>
                <th>Maksimal SKS</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($mahasiswas as $index => $mahasiswa)
              <tr>
                <td>{{ $mahasiswa['id'] }}</td>
                <td>{{ $mahasiswa['NIM'] }}</td>
                <td>{{ $mahasiswa['name'] }}</td>
                <td>{{ $mahasiswa['tempat_lahir'] }}</td>
                <td>{{ $mahasiswa['tanggal_lahir'] }}</td>
                <td>{{ $mahasiswa['jurusan'] }}</td>
                <td>{{ $mahasiswa['angkatan'] }}</td>
                <td>{{ $mahasiswa['maksimal_sks'] }}</td>
                <td>
                  <div class="btn-group" role="group">
                    <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                    <a href="{{ route('krs.index', $mahasiswa->id) }}" class="btn btn-sm btn-success">Regis KRS</a>
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
