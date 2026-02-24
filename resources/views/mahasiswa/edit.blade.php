<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h3>Edit Mahasiswa</h3>

    <form action="{{ route('mahasiswa.update', $mahasiswa->nim) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- NIM (readonly) -->
        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" class="form-control" id="nim" name="nim" 
                   value="{{ $mahasiswa->nim }}" readonly>
        </div>

        <!-- Nama -->
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                   id="nama" name="nama" value="{{ old('nama', $mahasiswa->nama) }}">
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Kelas -->
        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <input type="text" class="form-control @error('kelas') is-invalid @enderror" 
                   id="kelas" name="kelas" value="{{ old('kelas', $mahasiswa->kelas) }}">
            @error('kelas')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

<!-- Mata Kuliah -->
<div class="mb-3">
    <label class="form-label">Mata Kuliah</label>
    <select name="kode_mk" class="form-control @error('kode_mk') is-invalid @enderror">
        <option value="">-- Pilih Mata Kuliah --</option>
        @foreach($matakuliah as $mk)
            <option value="{{ $mk->kode_mk }}"
                {{ old('kode_mk', $mahasiswa->kode_mk) == $mk->kode_mk ? 'selected' : '' }}>
                {{ $mk->nama_mk }}
            </option>
        @endforeach
    </select>

    @error('kode_mk')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>