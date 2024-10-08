<?php

namespace App\Imports;

use App\Models\Teams;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TeamsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Teams([
            'name' => $row['name'],
            'coach' => $row['coach']
        ]);
    }
}
