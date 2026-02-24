<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mata Kuliah</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        }
        .card {
            border-radius: 15px;
        }
        .btn-custom {
            border-radius: 10px;
            font-weight: 600;
        }
        h3 {
            font-weight: 700;
        }
    </style>
</head>

<body>

<div class="container mt-5">
    <h3 class="text-center mb-4">Tambah Mata Kuliah</h3>

    <div class="card shadow">
        <div class="card-body">

            <form action="{{ route('matakuliah.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Kode MK</label>
                    <input type="text" name="kode_mk"
                        class="form-control @error('kode_mk') is-invalid @enderror"
                        value="{{ old('kode_mk') }}">
                    @error('kode_mk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Mata Kuliah</label>
                    <input type="text" name="nama_mk"
                        class="form-control @error('nama_mk') is-invalid @enderror"
                        value="{{ old('nama_mk') }}">
                    @error('nama_mk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">SKS</label>
                    <input type="number" name="sks"
                        class="form-control @error('sks') is-invalid @enderror"
                        value="{{ old('sks') }}">
                    @error('sks')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Semester</label>
                    <input type="number" name="semester"
                        class="form-control @error('semester') is-invalid @enderror"
                        value="{{ old('semester') }}">
                    @error('semester')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-end">
                    <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary btn-custom">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary btn-custom">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

</body>
</html>