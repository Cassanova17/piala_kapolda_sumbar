<?php

namespace App\Exports;

use App\Models\Athlete;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\URL;

class AthletesExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $athletes;

    public function __construct(Collection $athletes)
    {
        $this->athletes = $athletes;
    }

    public function collection()
    {
        return $this->athletes->map(function ($athlete) {
            return [
                'Nama' => $athlete->name,
                'Tempat Lahir' => $athlete->tempat_lahir,
                'Tanggal Lahir' => date('Y/m/d', strtotime($athlete->tanggal_lahir)),
                'NIK' => $athlete->nik,
                'No HP' => $athlete->no_hp,
                'Jenis Kelamin' => $athlete->jenis_kelamin,
                'Akte' => $athlete->akte 
                    ? URL::route('view.file', ['filename' => basename($athlete->akte)])
                    : '-',
                'Sertifikat Sabuk' => $athlete->sertifikat_sabuk 
                    ? URL::route('view.file', ['filename' => basename($athlete->sertifikat_sabuk)])
                    : '-',
                'Jenis Pertandingan' => $athlete->jenis_pertandingan,
                'Kelompok Umur' => $athlete->kelompok_umur,
                'Tingkat Pertandingan' => $athlete->tingkat_pertandingan,
                'Kelas Pertandingan' => $athlete->kelas_pertandingan,
                'Keterangan Pembayaran' => $athlete->sudah_bayar ? 'Sudah Bayar' : 'Belum Bayar',
                'Jumlah Pembayaran' => 'Rp. ' . number_format($athlete->jumlah_pembayaran, 0, ',', '.'),
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Tempat Lahir',
            'Tanggal Lahir',
            'NIK',
            'No HP',
            'Jenis Kelamin',
            'Akte',
            'Sertifikat Sabuk',
            'Jenis Pertandingan',
            'Kelompok Umur',
            'Tingkat Pertandingan',
            'Kelas Pertandingan',
            'Keterangan Pembayaran',
            'Jumlah Pembayaran',
        ];
    }
}
