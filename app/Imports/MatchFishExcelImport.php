<?php

namespace App\Imports;

use App\Models\MatchFish;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MatchFishExcelImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $start_date = date('Y-m-d', strtotime(str_replace('/', '-', $row['timestamp'])));
        return new MatchFish([
            'eventName'  => $row['eventname'],
            'eventVersion' => $row['eventversion'],
            'goldenTicket'    => $row['goldenticket'],
            'playDuration'  => $row['playduration'],
            'playTime' => $row['playtime'],
            'playerID'    => $row['playerid'],
            'score'  => $row['score'],
            'silverTicket' => $row['silverticket'],
            'stars'    => $row['stars'],
            'timestamp'  => $start_date,
            'durationPerPlay' => $row['durationperplay'],
            'freePerTicket'    => $row['freeperticket'],
            'silverPerTicket'  => $row['silverperticket'],
            'goldenPerTicket' => $row['goldenperticket'],
        ]);
    }
}