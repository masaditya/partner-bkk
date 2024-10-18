<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str; 

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
         $majors = [
            'Akuntansi Keuangan dan Lembaga' => '0771a888-0b54-4d89-913a-eb8ca07fbf34',
            'Perbankan Keuangan Mikro' => '18857d51-4e62-4bef-a5a9-a0b72ef09fc9',
            'Otomatisasi dan Tata Kelola Perkantoran (OTKP)' => '5b7e728b-36c6-4323-bf90-10fb00552845',
            'Bisnis Daring dan Pemasaran (BDP)' => '80e9e3bf-e2cb-4006-9fcc-3602a9e092e4',
            'Tata Busana' => 'b72b5bbe-42e0-4284-b4ed-ba04dfebf4f1',
            'Akomodasi Perhotelan' => 'ba196e22-bfb6-4db0-aea5-f6fccb99de7e',
            'Tata Boga' => 'd8fba318-a357-4be2-836b-dd9e59052738',
            'Teknik Komputer dan Jaringan' => 'da77582b-7b00-4b3f-8009-b22bd16c552e',
            'Multimedia' => 'dcb65783-0594-4eaf-b810-fe37b3aae48f',
        ];

        $majorId = $majors[$row['major_id']] ?? null;

        return new User([
            'id'              => Str::uuid(),
            'name'            => $row['nama'],
            'NIS'             => $row['nis'],
            'email'           => $row['email'],
            'password'        => $row['password'],
            'graduation_year' => $row['tahun_lulus'],
            'major_id'        => $majorId,
            'address'         => $row['address'],
            'phone'           => $row['phone'],
            'gender'          => $row['gender'],
            'is_alumni'          => 1,
        ]);
    }
}
