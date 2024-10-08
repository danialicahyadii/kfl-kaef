<?php

namespace App\Imports;

use App\Models\Matches;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MatchImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function date_convert($date)
    {
        if (is_numeric($date)) {
            $EXCEL_DATE = $date; // Your CSV value goes here
            $UNIX_DATE = ($EXCEL_DATE - 25569) * 86400;
            $date = gmdate('Y-m-d', $UNIX_DATE);
        } else {
            $date = null;
        }

        return $date;
    }
    public function model(array $row)
    {
        return new Matches([
            'match_date'  => $this->date_convert($row['match_date']),
            'home_team_id' => $row['home_team_id'],
            'away_team_id' => $row['away_team_id'],
            // 'result' => $row['result'],
        ]);
    }
}
