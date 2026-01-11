<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Bukti Peminjaman Ruangan</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h1 { color: #f97316; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        td, th { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f97316; color: white; }
    </style>
</head>
<body>
    <h1>Bukti Peminjaman Ruangan</h1>
    <p>Berikut adalah bukti peminjaman ruangan Anda:</p>

    <table>
        <tr>
            <th>Nama Penanggung Jawab</th>
            <td>{{ $peminjaman->nama_penanggung_jawab }}</td>
        </tr>
        <tr>
            <th>NIK/NIP</th>
            <td>{{ $peminjaman->nik_penanggung_jawab }}</td>
        </tr>
        <tr>
            <th>Instansi</th>
            <td>{{ $peminjaman->instansi }}</td>
        </tr>
        <tr>
            <th>Jabatan</th>
            <td>{{ $peminjaman->jabatan }}</td>
        </tr>
        <tr>
            <th>Tipe Ruangan</th>
            <td>{{ $peminjaman->tipe_ruangan }}</td>
        </tr>
        <tr>
            <th>Ruangan</th>
            <td>{{ $peminjaman->ruangan }}</td>
        </tr>
        <tr>
            <th>Tanggal Peminjaman</th>
            <td>{{ \Carbon\Carbon::parse($peminjaman->tanggal_peminjaman)->translatedFormat('l, j F Y') }}</td>
        </tr>
        <tr>
            <th>Waktu Mulai - Selesai</th>
            <td>{{ $peminjaman->waktu_mulai }} s/d {{ $peminjaman->waktu_selesai }}</td>
        </tr>
        <tr>
            <th>Keperluan</th>
            <td>{{ $peminjaman->keperluan }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ ucfirst($peminjaman->status) }}</td>
        </tr>
    </table>
</body>
</html>
