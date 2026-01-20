<?php

namespace App\Imports;

use App\Models\Krs;
use App\Models\Nilai;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class NilaiImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows->skip(1) as $row) {

            $nim   = $row[0];
            $tugas = $row[1];
            $kuis  = $row[2];
            $uts   = $row[3];
            $uas   = $row[4];

            $krs = Krs::whereHas('mahasiswa', function ($q) use ($nim) {
                $q->where('nim_nik', $nim);
            })->first();

            if (!$krs) continue;

            if ($krs->nilai && $krs->nilai->is_locked) continue;

            $nilaiAkhir = (
                ($tugas * 0.2) +
                ($kuis  * 0.1) +
                ($uts   * 0.3) +
                ($uas   * 0.4)
            );

            $grade = match (true) {
                $nilaiAkhir >= 85 => 'A',
                $nilaiAkhir >= 75 => 'B',
                $nilaiAkhir >= 65 => 'C',
                $nilaiAkhir >= 50 => 'D',
                default           => 'E',
            };

            Nilai::updateOrCreate(
                ['krs_id' => $krs->id],
                [
                    'tugas' => $tugas,
                    'kuis'  => $kuis,
                    'uts'   => $uts,
                    'uas'   => $uas,
                    'nilai_akhir' => round($nilaiAkhir, 2),
                    'grade' => $grade,
                ]
            );
        }
    }
}
