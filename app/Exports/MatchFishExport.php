<?php

namespace App\Exports;

use App\Models\MatchFish;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MatchFishExport implements FromCollection, WithCustomCsvSettings, WithHeadings
{
    protected $date;

    function __construct($date) {
            $this->date = $date;
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ','
        ];
    }

    public function headings(): array
    {
        return [
            'dateTimestamp',
            'totalPlayer',
            'avePlayTime',
            'aveDurationPerPlay'
        ];
    }

    public function collection()
    {
        return collect(MatchFish::getCustom($this->date));
    }
}
