<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .btn-tambah {
            border-radius: 12px;
            padding: 8px 16px;
            font-weight: 600;
            letter-spacing: 0.3px;
        }
    </style>
</head>

<body class="bg-light">

<div class="container mt-5">

    <h3 class="mb-4 text-center">Data Mahasiswa</h3>

    <!-- Tombol Tambah Versi Clean -->
    <div class="mb-3 text-start">
        <a href="{{ route('mahasiswa.create') }}" 
           class="btn btn-primary btn-tambah">
            <i class="bi bi-plus-lg me-1"></i>
            Tambah Mahasiswa
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead class="table-dark text-center">
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Matakuliah</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($mahasiswas as $m)
                    <tr class="text-center">
                        <td>{{ $m->nim }}</td>
                        <td>{{ $m->nama }}</td>
                        <td>{{ $m->kelas }}</td>
                        <td>{{ $m->matakuliah->nama_mk??'-' }}</td>

                        <td>
                            <a href="{{ route('mahasiswa.edit', $m->nim) }}"
                               class="btn btn-warning btn-sm me-1">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <form action="{{ route('mahasiswa.destroy', $m->nim) }}"
                                  method="POST"
                                  class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin hapus data?')"
                                        class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>

</div>

</body>
</html>
