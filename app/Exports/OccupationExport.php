<?php

namespace App\Exports;

use App\Models\Occupations;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OccupationExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'Posisi',
            'Perusahaan',
            'Lokasi',
            'Batas Lamar',
            'Publisher',
            'Dibuat',
        ];
    }

    public function collection()
    {
        return Occupations::select([
                'title',
                'deadline',
                'company',
                'location',
                'publisher_id',
                'created_at'
            ])
            ->get()
            ->map(function ($occupation) {
                return [
                    'title' => $occupation->title,
                    'company' => $occupation->company,
                    'location' => $occupation->location,
                    'deadline' => $occupation->deadline,
                    'publisher_id' => $occupation->admin->is_partner == 0 ? 'Admin' : $occupation->admin->name,
                    'created_at' => $occupation->created_at
                ];
            });
    }
}