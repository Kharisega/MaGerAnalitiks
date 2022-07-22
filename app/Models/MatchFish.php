<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MatchFish extends Model
{
    protected $primaryKey = 'id';
    public $table = 'malamgoldenfish';
    protected $guarded = [];

    public static function getCustom($date)
    {
        $data = [];
        $totalPlayer = DB::table('malamgoldenfish')->where('timestamp', $date)->count();
        array_push($data, $date);
        array_push($data, $totalPlayer);

        // ! Average Play Time
        $playTime = DB::table('malamgoldenfish')->where('timestamp', $date)->select('playTime')->get();
        $avePlayTime = 0;
        for ($i=0; $i < count($playTime); $i++) { 
            $avePlayTime = $avePlayTime + $playTime[$i]->playTime;
        };
        ( $avePlayTime == 0 ) ? $avePlayTime == 0 : $avePlayTime = $avePlayTime/count($playTime);
        array_push($data, $avePlayTime);

        // ! Average Duration Play Time
        $durationPerPlay = DB::table('malamgoldenfish')->where('timestamp', $date)->select('durationPerPlay')->get();
        // dd($durationPerPlay);
        $aveDurationPerPlay = 0.0;
        for ($j=0; $j < count($durationPerPlay); $j++) {
            $aveDurationPerPlay = $aveDurationPerPlay + $durationPerPlay[$j]->durationPerPlay;
        };
        ( $aveDurationPerPlay == 0 ) ? $aveDurationPerPlay == 0 : $aveDurationPerPlay = $aveDurationPerPlay/count($playTime);
        array_push($data, $aveDurationPerPlay);

        return [
            [$date,
            $totalPlayer,
            $avePlayTime,
            $aveDurationPerPlay,]
        ];
    }
}
