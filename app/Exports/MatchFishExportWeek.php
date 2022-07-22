<?php

namespace App\Exports;

use App\Models\MatchFish;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class MatchFishExportWeek implements FromCollection, WithCustomCsvSettings, WithHeadings, WithStrictNullComparison
{
    protected $date1;
    protected $date2;

    function __construct($date) {
            $this->date1 = $date[0];
            $this->date2 = $date[1];
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
        return collect(MatchFish::exportRange($this->date1, $this->date2));
    }
}
