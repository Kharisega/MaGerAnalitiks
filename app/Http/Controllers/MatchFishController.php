<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MatchFish;
use App\Imports\MatchFishImport;
use App\Imports\MatchFishExcelImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Exports\MatchFishExport;

class MatchFishController extends Controller
{
    public function index()
    {
        $matchFish = MatchFish::simplePaginate(10);
        return view('matchFish.matchFish', ['matchFish' => $matchFish]);
    }

    public function import_excel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx',
		]);
        $file = $request->file('file');
		$nama_file = rand().$file->getClientOriginalName();
		$file->move('malamMatchFish',$nama_file);
		Excel::import(new MatchFishExcelImport, public_path('/malamMatchFish/'.$nama_file));
        return redirect()->back()->with('success', "Data Berhasil ditambahkan");
    }

    public function import_csv(Request $request)
    {
        if ($request->file('file')->getClientMimeType() != "text/csv") {
            return redirect()->back()->with('error', "File yang diinputkan harus berupa .csv!");
        }
        $file = $request->file('file');
		$nama_file = rand().$file->getClientOriginalName();
		$file->move('malamMatchFish',$nama_file);
		Excel::import(new MatchFishImport, public_path('/malamMatchFish/'.$nama_file));
        return redirect()->back()->with('success', "Data Berhasil ditambahkan");
    }

    public function perDayView()
    {
        $getDate = DB::table('malamgoldenfish')->select(DB::raw('GROUP_CONCAT(DISTINCT(timestamp)) as timestamp'))->get();
        $dateOption = (string)$getDate[0]->timestamp;
        return view('matchFish.perDay', ['dateOption' => $dateOption]);
    }

    public function avePerDay(Request $request)
    {
        $data = [];
        $date = $request->date;
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

        $getDate = DB::table('malamgoldenfish')->select(DB::raw('GROUP_CONCAT(DISTINCT(timestamp)) as timestamp'))->get();
        $dateOption = (string)$getDate[0]->timestamp;
        
        return view('matchFish.perDay', [
            'date' => $date,
            'totalPlayer' => $totalPlayer,
            'avePlayTime'=> $avePlayTime,
            'aveDurationPerPlay' => $aveDurationPerPlay,
            'dateOption' => $dateOption,
        ]);
    }

    public function perWeekView()
    {
        return view('matchFish.perWeek');
    }

    public function avePerWeek(Request $request)
    {
        $date1 = $request->date1;
        $date2 = $request->date2;
        $totalPlayer = DB::table('malamgoldenfish')->whereBetween('timestamp', [$date1, $date2])->count();
        // dd($playTime);
        
        // ! Average Play Time
        $playTime = DB::table('malamgoldenfish')->whereBetween('timestamp', [$date1, $date2])->select('playTime')->get();
        $avePlayTime = 0;
        for ($i=0; $i < count($playTime); $i++) { 
            $avePlayTime = $avePlayTime + $playTime[$i]->playTime;
        };
        ( $avePlayTime == 0 ) ? $avePlayTime == 0 : $avePlayTime = $avePlayTime/count($playTime);

        // ! Average Duration Play Time
        $durationPerPlay = DB::table('malamgoldenfish')->whereBetween('timestamp', [$date1, $date2])->select('durationPerPlay')->get();
        $aveDurationPerPlay = 0.0;
        for ($j=0; $j < count($durationPerPlay); $j++) {
            $aveDurationPerPlay = $aveDurationPerPlay + $durationPerPlay[$j]->durationPerPlay;
        };
        ( $aveDurationPerPlay == 0 ) ? $aveDurationPerPlay == 0 : $aveDurationPerPlay = $aveDurationPerPlay/count($playTime);

        return view('matchFish.perWeek', [
            'date1' => $date1,
            'date2' => $date2,
            'totalPlayer' => $totalPlayer,
            'avePlayTime'=> $avePlayTime,
            'aveDurationPerPlay' => $aveDurationPerPlay,
        ]);
    }

    public function perYearView()
    {
        return view('matchFish.perYear');
    }

    public function avePerYear(Request $request)
    {
        $year = $request->year;
        $totalPlayer = DB::table('malamgoldenfish')->whereRaw('YEAR(timestamp)', [$year])->count();
        
        // ! Average Play Time
        $playTime = DB::table('malamgoldenfish')->whereRaw('YEAR(timestamp)', [$year])->select('playTime')->get();
        $avePlayTime = 0;
        for ($i=0; $i < count($playTime); $i++) { 
            $avePlayTime = $avePlayTime + $playTime[$i]->playTime;
        };
        ( $avePlayTime == 0 ) ? $avePlayTime == 0 : $avePlayTime = $avePlayTime/count($playTime);

        // ! Average Duration Play Time
        $durationPerPlay = DB::table('malamgoldenfish')->whereRaw('YEAR(timestamp)', [$year])->select('durationPerPlay')->get();
        $aveDurationPerPlay = 0.0;
        for ($j=0; $j < count($durationPerPlay); $j++) {
            $aveDurationPerPlay = $aveDurationPerPlay + $durationPerPlay[$j]->durationPerPlay;
        };
        ( $aveDurationPerPlay == 0 ) ? $aveDurationPerPlay == 0 : $aveDurationPerPlay = $aveDurationPerPlay/count($playTime);

        return view('matchFish.perYear', [
            'year' => $year,
            'totalPlayer' => $totalPlayer,
            'avePlayTime'=> $avePlayTime,
            'aveDurationPerPlay' => $aveDurationPerPlay,
        ]);
    }

    public function exportCSV(Request $request)
    {
        $date = $request->date;
        $nameFile = $date . 'DataAverage.csv';
        return Excel::download(new MatchFishExport($date), $nameFile);
    }
}
