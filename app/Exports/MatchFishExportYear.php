<?php

namespace App\Exports;

use App\Models\MatchFish;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class MatchFishExportYear implements FromCollection, WithCustomCsvSettings, WithHeadings, WithStrictNullComparison
{
    protected $year;

    function __construct($year) {
            $this->year = $year;
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
        return collect(MatchFish::exportPerYear($this->year));
    }
}
