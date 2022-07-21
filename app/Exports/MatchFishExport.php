<?php

namespace App\Exports;

use App\Models\MatchFish;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MatchFishExport implements FromCollection, WithCustomCsvSettings, WithHeadings
{
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ','
        ];
    }

    public function headings(): array
    {
        return ['eventName',
        'eventVersion',
        'goldenTicket',
        'playDuration',
        'playTime',
        'playerID',
        'score',
        'silverTicket',
        'stars',
        'timestamp',
        'durationPerPlay',
        'freePerTicket',
        'silverPerTicket',
        'goldenPerTicket',];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return MatchFish::all();
    }
}
