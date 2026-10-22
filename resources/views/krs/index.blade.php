<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KRS - SiAkad Plus</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
            color: #333;
            background: #f1f5f8;
        }

        /* Navbar */
        .navbar-custom {
            height: 42px;
            background: #fff;
            border-bottom: 1px solid #e8e8e8;
            display: flex;
            align-items: center;
            padding: 0 8%;
            gap: 20px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 7px;
            color: #222;
            font-size: 13px;
            font-weight: bold;
            white-space: nowrap;
        }

       .brand-logo {
    width: 25px;
    height: 25px;
    object-fit: contain;
    display: block;
    flex-shrink: 0;
}

        .nav-links {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .nav-links a {
            text-decoration: none;
            color: #555;
            font-size: 10px;
        }

        .user-info {
            margin-left: auto;
            font-size: 10px;
            color: #555;
            white-space: nowrap;
        }

        /* Area utama */
        .page-container {
            max-width: 430px;
            margin: 0 auto;
        }

        .breadcrumb-custom {
            padding: 10px 0;
            font-size: 10px;
            color: #7194a8;
        }

        .breadcrumb-custom a {
            color: #7194a8;
            text-decoration: none;
        }

        /* Kartu KRS */
        .krs-card {
            background: #fff;
            border: 1px solid #e8e8e8;
            border-radius: 5px;
            padding: 12px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08);
        }

        .card-heading {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 7px;
            margin-bottom: 8px;
        }

        .card-heading h5 {
            font-size: 14px;
            font-weight: bold;
            margin: 0;
        }

        .total-sks {
            font-size: 10px;
            color: #555;
        }

        /* Tabel */
        .table-krs {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 8px;
        }

        .table-krs th,
        .table-krs td {
            padding: 6px 4px;
            border-bottom: 1px solid #e8e8e8;
            text-align: left;
            vertical-align: middle;
            font-size: 10px;
        }

        .table-krs th {
            font-weight: bold;
            color: #222;
        }

        .table-krs th:first-child,
        .table-krs td:first-child {
            width: 16%;
        }

        .table-krs th:nth-child(2),
        .table-krs td:nth-child(2) {
            width: 49%;
        }

        .table-krs th:nth-child(3),
        .table-krs td:nth-child(3) {
            width: 18%;
        }

        .table-krs th:last-child,
        .table-krs td:last-child {
            width: 17%;
        }

        /* Label SKS */
        .badge-sks {
            display: inline-block;
            padding: 2px 5px;
            border-radius: 10px;
            color: #fff;
            font-size: 9px;
            font-weight: bold;
            white-space: nowrap;
        }

        .sks-hijau {
            background: #198754;
        }

        .sks-kuning {
            background: #f0ad28;
        }

        /* Tombol */
        .btn-batal {
            background: #dc3545;
            color: white;
            border: none;
            border-radius: 3px;
            padding: 3px 7px;
            font-size: 9px;
            line-height: 1.4;
            cursor: pointer;
        }

        .btn-batal:hover {
            background: #bb2d3b;
        }

        .footer-actions {
            display: flex;
            justify-content: flex-end;
            padding-top: 0;
        }

        .btn-simpan {
            background: #198754;
            color: white;
            border: none;
            border-radius: 3px;
            padding: 5px 10px;
            font-size: 10px;
            cursor: pointer;
        }

        .btn-simpan:hover {
            background: #157347;
        }

        @media (max-width: 500px) {
            .navbar-custom {
                padding: 0 12px;
                gap: 12px;
            }

            .page-container {
                width: calc(100% - 24px);
            }

            .nav-links {
                gap: 9px;
            }

            .user-info {
                font-size: 9px;
            }

            .table-krs th,
            .table-krs td {
                padding: 6px 2px;
                font-size: 9px;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar-custom">
        <div class="brand">
            <img
    src="{{ asset('logo-tutwuri.png') }}"
    alt="Logo Tut Wuri Handayani"
    class="brand-logo"
>
            <span>SiAkad Plus</span>
        </div>

        <div class="nav-links">
            <a href="#">Dashboard</a>
            <a href="{{ route('krs.index') }}">KRS</a>
            <a href="#">Keluar</a>
        </div>

        <div class="user-info">
            {{ $mahasiswa['nama'] }} ({{ $mahasiswa['nim'] }})
        </div>
    </nav>

    <main class="page-container">
        <div class="breadcrumb-custom">
            <a href="#">Home</a>
            <span> &gt; </span>
            <span>KRS</span>
        </div>

        <section class="krs-card">
            <div class="card-heading">
                <h5>Kartu Rencana Studi (KRS)</h5>
                <span class="total-sks">
                    Total SKS: <span id="totalSks">{{ $totalSks }}</span>
                </span>
            </div>

            <table class="table-krs">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody id="daftarMatkul">
                    @foreach ($matakuliah as $mk)
                        <tr>
                            <td>{{ $mk['kode'] }}</td>
                            <td>{{ $mk['nama'] }}</td>
                            <td>
                                <span class="badge-sks
                                    {{ $mk['sks'] == 3 ? 'sks-hijau' : 'sks-kuning' }}">
                                    {{ $mk['sks'] }} SKS
                                </span>
                            </td>
                            <td>
                                <button
                                    type="button"
                                    class="btn-batal"
                                    data-sks="{{ $mk['sks'] }}"
                                    onclick="hapusMatkul(this)">
                                    Batal
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="footer-actions">
                <button type="button" class="btn-simpan" onclick="simpanKRS()">
                    Simpan KRS
                </button>
            </div>
        </section>
    </main>

    <script>
        function hapusMatkul(button) {
            const baris = button.closest('tr');
            const sks = Number(button.dataset.sks);

            if (confirm('Batalkan mata kuliah ini?')) {
                baris.remove();

                const totalSks = document.querySelectorAll('#daftarMatkul tr');
                let jumlah = 0;

                totalSks.forEach(function (tr) {
                    jumlah += Number(
                        tr.querySelector('.btn-batal').dataset.sks
                    );
                });

                document.getElementById('totalSks').textContent = jumlah;
            }
        }

        function simpanKRS() {
            alert('KRS berhasil disimpan!');
        }
    </script>

</body>
</html>