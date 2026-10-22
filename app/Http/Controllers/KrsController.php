<?php
namespace App\Http\Controllers;

class KrsController extends Controller
{
    public function index()
    {
        $mahasiswa = [
            'nama' => 'Eka Fadilla',
            'nim' => '2503041',
        ];

        $matakuliah = [
            ['kode' => 'MK101', 'nama' => 'Pemrograman Web Lanjut', 'sks' => 3],
            ['kode' => 'MK102', 'nama' => 'Struktur Data', 'sks' => 4],
            ['kode' => 'MK103', 'nama' => 'Basis Data', 'sks' => 4],
        ];

        $totalSks = array_sum(
            array_column($matakuliah, 'sks')
        );

        return view('krs.index', compact(
            'mahasiswa',
            'matakuliah',
            'totalSks'
        ));
    }
}
