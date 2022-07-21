<?php

namespace App\Exports;

use App\Models\MatchFish;
use Maatwebsite\Excel\Concerns\FromCollection;

class MatchFishExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return MatchFish::all();
    }
}
