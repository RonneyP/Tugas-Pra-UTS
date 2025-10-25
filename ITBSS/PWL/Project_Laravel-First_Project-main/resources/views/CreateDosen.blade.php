<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Dosen</title>
  @vite(['resources/js/app.js'])
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="card shadow-lg">
      <div class="card-header bg-primary text-white">
        <h2 class="mb-0">Create Mahasiswa</h2>
      </div>
      <div class="card-body">
        @php
        $isEdit = isset($dosen);
        @endphp

        <form action="{{ $isEdit ? route('dosen.update', $dosen->id) : route('dosen.store') }}" method="POST">
          @csrf
          @if($isEdit) 
            @method('PUT')
          @endif

          <div class="mb-3">
            <label for="NIM" class="form-label">NIP</label>
            <input type="text" name="NIP" id="NIP" class="form-control" placeholder="Masukkan NIM"
                    value="{{ old('NIP', $isEdit ? $dosen->NIP : '') }}">
          </div>

          <div class="mb-3">
            <label for="Nama" class="form-label">Nama</label>
            <input type="text" name="Nama" id="Nama" class="form-control" placeholder="Masukkan nama lengkap"
                    value="{{ old('Nama', $isEdit ? $dosen->Nama : '') }}">
          </div>

          <div class="mb-3">
            <label for="Pendidikan_Terakhir" class="form-label">Pendidikan Terakhir</label>
            <input type="text" name="Pendidikan_Terakhir" id="Pendidikan_Terakhir" class="form-control" placeholder="Masukkan tempat lahir"
                    value="{{ old('Pendidikan_Terakhir', $isEdit ? $dosen->Pendidikan_Terakhir : '') }}">
          </div>

          <button type="submit" class="btn btn-primary">
                {{ $isEdit ? 'Update' : 'Create' }}
          </button>
          <a href="{{ url('/dosen') }}" class="btn btn-secondary">Batal</a>
        </form>
      </div>
    </div>
  </div>

</body>
</html>