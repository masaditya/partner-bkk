<?php

namespace App\Exports;

use App\Models\Applicant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ApplicantExport implements FromCollection, WithHeadings
{
    protected $id;
    public function __construct($id)
    {
        $this->id = $id;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'Nama',
            'Email',
            'Jenis Kelamin',
            'Tahun Lulus',
            'Jurusan',
            'Status Alumni',
            'No. Telepon',
            'Gelar Terakhir',
            'Universitas',
            'Fakultas',
            'Posisi Lowongan',
            'Perusahaan Lowongan',
            'Lokasi Lowongan',
            'Batas Lamar',
            'Publisher',
            'Dibuat',
        ];
    }

    public function collection()
    {
        return Applicant::select([
                'id_user',
                'id_occupation',
                'created_at',
            ])
            ->where('id_occupation', $this->id)
            ->get()
            ->map(function ($applicant) {
                return [
                    'Nama' => $applicant->user->name,
                    'Email' => $applicant->user->email,
                    'Jenis Kelamin' => $applicant->user->gender == 'male' ? 'Laki - Laki' : 'Perempuan',
                    'Tahun Lulus' => $applicant->user->graduation_year,
                    'Jurusan' => $applicant->user->major->name,
                    'Status Alumni' => $applicant->user->is_alumni ? 'Alumni' : 'Umum',
                    'No. Telepon' => $applicant->user->phone,
                    'Gelar Terakhir' => $applicant->user->latest_degree,
                    'Universitas' => $applicant->user->university,
                    'Fakultas' => $applicant->user->faculty,
                    'Posisi Lowongan' => $applicant->occupation->title,
                    'Perusahaan Lowongan' => $applicant->occupation->company,
                    'Lokasi Lowongan' => $applicant->occupation->location,
                    'Batas Lamar' => $applicant->occupation->deadline,
                    'Publisher' => $applicant->occupation->admin->is_partner == 0 ? 'Admin' : $applicant->occupation->admin->name,
                    'Dibuat' => $applicant->created_at
                ];
            });
    }
}
