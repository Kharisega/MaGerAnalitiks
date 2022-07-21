<?php

namespace App\Imports;

use App\Models\MatchFish;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class MatchFishImport implements ToModel, WithStartRow, WithCustomCsvSettings
{
    public function startRow(): int
    {
        return 2;
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ','
        ];
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $start_date = date('Y-m-d', strtotime(str_replace('/', '-', $row[9])));
        return new MatchFish([
            'eventName'  => $row[0],
            'eventVersion' => $row[1],
            'goldenTicket'    => $row[2],
            'playDuration'  => $row[3],
            'playTime' => $row[4],
            'playerID'    => $row[5],
            'score'  => $row[6],
            'silverTicket' => $row[7],
            'stars'    => $row[8],
            'timestamp'  => $start_date,
            'durationPerPlay' => $row[10],
            'freePerTicket'    => $row[11],
            'silverPerTicket'  => $row[12],
            'goldenPerTicket' => $row[13],
        ]);
    }
}
