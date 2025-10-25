<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Mata Kuliah</title>
  @vite(['resources/js/app.js'])
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="card shadow-lg">
      <div class="card-header bg-primary text-white">
        <h2 class="mb-0">Create MataKuliah</h2>
      </div>
      <div class="card-body">
        @php
        $isEdit = isset($matakuliah);
        @endphp

        <form action="{{ $isEdit ? route('matakuliah.update', $matakuliah->id) : route('matakuliah.store') }}" method="POST">
          @csrf
          @if($isEdit) 
            @method('PUT')
          @endif

          <div class="mb-3">
            <label for="kodemk" class="form-label">Kode MK</label>
            <input type="text" name="kodemk" id="kodemk" class="form-control" placeholder="Masukkan Kode MK"
                    value="{{ old('kodemk', $isEdit ? $matakuliah->kodemk : '') }}">
          </div>

          <div class="mb-3">
            <label for="namamk" class="form-label">Nama MK</label>
            <input type="text" name="namamk" id="namamk" class="form-control" placeholder="Masukkan Nama MK lengkap"
                    value="{{ old('namamk', $isEdit ? $matakuliah->namamk : '') }}">
          </div>

          <div class="mb-3">
            <label class="form-label">Jurusan</label>
            @foreach(['Bisnis Digital','Kewirausahaan','Sistem dan Teknologi Informasi'] as $jurusan)
            <div class="form-check">
                <input type="radio" name="jurusan" value="{{ $jurusan }}" class="form-check-input"
                    {{ ($isEdit && $matakuliah->jurusan == $jurusan) ? 'checked' : '' }}>
                <label class="form-check-label">{{ $jurusan }}</label>
            </div>
            @endforeach
          </div>

           <div class="mb-3">
            <label for="sks" class="form-label">SKS</label>
            <input type="text" name="sks" id="sks" class="form-control" placeholder="Masukkan Jumlah SKS"
                    value="{{ old('sks', $isEdit ? $matakuliah->sks : '') }}">
          </div>

           <div class="mb-3">
            <label for="dosen_id" class="form-label">Dosen</label>
            <select name="dosen_id" id="dosen_id" class="form-control" placeholder="Masukkan Nama Dosen">
              @foreach($dosens as $dosen)
              <option value="{{ $dosen->id }}">{{ $dosen->Nama }}</option>
              @endforeach
            </select>
          </div>

          <button type="submit" class="btn btn-primary">
                {{ $isEdit ? 'Update' : 'Create' }}
          </button>
          <a href="{{ url('/matakuliah') }}" class="btn btn-secondary">Batal</a>
        </form>
      </div>
    </div>
  </div>

</body>
</html>