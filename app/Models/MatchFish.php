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

    public static function exportRange($date1, $date2)
    {
        $arr = [];
        for ($i=1; $date1 != $date2 ; $i++) { 
            $date1 = date('Y-m-d', strtotime($date1. ' + '. 1 .' days'));
            array_push($arr, $date1);
        }
        
        $data = [];
        for ($j=0; $j < count($arr); $j++) { 
            $res = [];
            
            $totalPlayer = DB::table('malamgoldenfish')->where('timestamp', $arr[$j])->count();

            // ! Average Play Time
            $playTime = DB::table('malamgoldenfish')->where('timestamp', $arr[$j])->select('playTime')->get();
            $avePlayTime = 0;
            for ($h=0; $h < count($playTime); $h++) { 
                $avePlayTime = $avePlayTime + $playTime[$h]->playTime;
            };
            ( $avePlayTime == 0 ) ? $avePlayTime == 0 : $avePlayTime = $avePlayTime/count($playTime);

            // ! Average Duration Play Time
            $durationPerPlay = DB::table('malamgoldenfish')->where('timestamp', $arr[$j])->select('durationPerPlay')->get();
            $aveDurationPerPlay = 0.0;
            for ($k=0; $k < count($durationPerPlay); $k++) {
                $aveDurationPerPlay = $aveDurationPerPlay + $durationPerPlay[$k]->durationPerPlay;
            };
            ( $aveDurationPerPlay == 0 ) ? $aveDurationPerPlay == 0 : $aveDurationPerPlay = $aveDurationPerPlay/count($playTime);

            array_push($res, $arr[$j]);
            array_push($res, $totalPlayer);
            array_push($res, $avePlayTime);
            array_push($res, $aveDurationPerPlay);
            array_push($data, $res);
    };

        return [$data];
    }

    public static function exportPerYear($year)
    {
        $date1 = $year . '-01-00';
        $date2 = $year . '-12-31';

        $arr = [];
        for ($i=1; $date1 != $date2 ; $i++) { 
            $date1 = date('Y-m-d', strtotime($date1. ' + '. 1 .' days'));
            array_push($arr, $date1);
        }
        
        $data = [];
        for ($j=0; $j < count($arr); $j++) { 
            $res = [];
            
            $totalPlayer = DB::table('malamgoldenfish')->where('timestamp', $arr[$j])->count();

            // ! Average Play Time
            $playTime = DB::table('malamgoldenfish')->where('timestamp', $arr[$j])->select('playTime')->get();
            $avePlayTime = 0;
            for ($h=0; $h < count($playTime); $h++) { 
                $avePlayTime = $avePlayTime + $playTime[$h]->playTime;
            };
            ( $avePlayTime == 0 ) ? $avePlayTime == 0 : $avePlayTime = $avePlayTime/count($playTime);

            // ! Average Duration Play Time
            $durationPerPlay = DB::table('malamgoldenfish')->where('timestamp', $arr[$j])->select('durationPerPlay')->get();
            $aveDurationPerPlay = 0.0;
            for ($k=0; $k < count($durationPerPlay); $k++) {
                $aveDurationPerPlay = $aveDurationPerPlay + $durationPerPlay[$k]->durationPerPlay;
            };
            ( $aveDurationPerPlay == 0 ) ? $aveDurationPerPlay == 0 : $aveDurationPerPlay = $aveDurationPerPlay/count($playTime);

            array_push($res, $arr[$j]);
            array_push($res, $totalPlayer);
            array_push($res, $avePlayTime);
            array_push($res, $aveDurationPerPlay);
            array_push($data, $res);
    };

        return [$data];
    }
}
