<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mata Kuliah</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        }

        .btn-tambah {
            border-radius: 12px;
            padding: 8px 18px;
            font-weight: 600;
            letter-spacing: 0.3px;
        }

        .card {
            border-radius: 15px;
        }

        .table thead {
            font-size: 14px;
        }

        .table td {
            vertical-align: middle;
        }

        h3 {
            font-weight: 700;
        }
    </style>
</head>

<body>

<div class="container mt-5">

    <h3 class="mb-4 text-center">Data Mata Kuliah</h3>

    <!-- Tombol Tambah -->
    <div class="mb-3 text-start">
        <a href="{{ route('matakuliah.create') }}" 
           class="btn btn-primary btn-tambah">
            <i class="bi bi-plus-lg me-1"></i>
            Tambah Mata Kuliah
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow">
        <div class="card-body">

            <table class="table table-bordered table-striped text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Kode MK</th>
                        <th>Nama Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Semester</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($matakuliah as $mk)
                    <tr>
                        <td>{{ $mk->kode_mk }}</td>
                        <td class="text-start">{{ $mk->nama_mk }}</td>
                        <td>{{ $mk->sks }}</td>
                        <td>{{ $mk->semester }}</td>

                        <td>
                            <a href="{{ route('matakuliah.edit', $mk->kode_mk) }}"
                               class="btn btn-warning btn-sm me-1">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <form action="{{ route('matakuliah.destroy', $mk->kode_mk) }}"
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