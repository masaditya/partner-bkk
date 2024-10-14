<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'Nama',
            'Email',
            'NIS',
            'Jenis Kelamin',
            'Tahun Lulus',
            'Jurusan',
            'Alumni',
            'Status',
            'Perusahaan',
            'Industri',
            'Posisi',
            'Alamat',
            'No. Telepon',
            'Gelar Terakhir',
            'Universitas',
            'Fakultas',
        ];
    }

    public function collection()
    {
        return User::select([
                'name',
                'email',
                'NIS',
                'gender',
                'graduation_year',
                'major_id',
                'is_alumni',
                'status_id',
                'company',
                'company_industry_id',
                'position',
                'address',
                'phone',
                'latest_degree',
                'university',
                'faculty',
            ])
            ->get()
            ->map(function ($user) {
                return [
                    'name' => $user->name,
                    'email' => $user->email,
                    'NIS' => $user->NIS,
                    'gender' => $user->gender == 'male' ? 'Laki - Laki' : 'Perempuan',
                    'graduation_year' => $user->graduation_year,
                    'major_id' => $user->major?->name ?? '',
                    'is_alumni' => $user->is_alumni ? 'Alumni' : 'Umum',
                    'status_id' => $user->employmentStatus?->name ?? '',
                    'company' => $user->company,
                    'company_industry_id' => $user->companyIndustry?->name ?? '',
                    'position' => $user->position,
                    'address' => $user->address,
                    'phone' => $user->phone,
                    'latest_degree' => $user->latest_degree,
                    'university' => $user->university,
                    'faculty' => $user->faculty,
                ];
            });
    }
}
