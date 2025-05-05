<?php

namespace App\Exports;

use App\Models\Athlete;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AthletesExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $athletes;

    public function __construct(Collection $athletes)
    {
        $this->athletes = $athletes;
    }

    /**
    * @return \Illuminate\Support\Collection
    */

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
                'Akte' => $athlete->akte,
                'Sertifikat Sabuk' => $athlete->sertifikat_sabuk,
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
            'Dibuat Pada',
            'Diperbarui Pada',
        ];
    }
}