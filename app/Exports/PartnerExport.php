<?php

namespace App\Exports;

use App\Models\Admin;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PartnerExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'Nama Perusahaan',
            'Email',
            'No. Telepon',
            'Kota',
            'Industri',
        ];
    }

    public function collection()
    {
        return Admin::where('is_partner', 1)
            ->select([
                'id',
                'company_name',
                'email',
                'phone',
                'company_city',
                'company_industry_id',
            ])
            ->get()
            ->map(function ($admin) {
                return [
                    'company_name' => $admin->company_name,
                    'email' => $admin->email,
                    'phone' => $admin->phone,
                    'company_city' => $admin->company_city,
                    'industri' => $admin->companyIndustry->name,
                ];
            });
    }
}
