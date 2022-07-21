@extends('layouts.sidebar')

@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <div class="container">
        @php
        function tgl_indo($tanggal){
            $bulan = array (
                1 => 'Januari',
                'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
        $pecahkan = explode('-', $tanggal);
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
        }

        $dateOptional = explode(',', $dateOption);
        @endphp

<center class="py-4">
            <h4>Rata-rata Malam Golden Match Fish</h4>
        </center>
        <br><br>
        
        <div class="row">
                <div class="col">
                    <form action="{{ route('matchFishPerDay') }}" method="POST">
                        @csrf
                        <div class="row row-md-5">
                            <div class="col col-md-6">
                                <select name="date" id="date" class="form-select">
                                    @foreach ($dateOptional as $tanggal)
                                        <option value="{{ $tanggal }}">{{ tgl_indo($tanggal) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col col-md-5" style="position:relative; left:60px;">
                                <button class="btn btn-warning" type="submit">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><br><br><br>
                        <div class="row">
                            <h2>Data yang didapat dari tanggal : {{ isset($date) ? tgl_indo($date) : '' }}</h2>
                        </div>
        
    
    
    <div class="row" style="margin-top:50px;">
        <div class="col">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize text-dark">Jumlah User</p>
                        <h4 class="mb-0"></h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0 text-dark">{{ isset($totalPlayer) ? $totalPlayer : '' }}</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize text-dark">Average Play Time Per Day</p>
                        <h4 class="mb-0"></h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0 text-dark">{{ isset($avePlayTime) ? $avePlayTime : '' }}</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize text-dark">Average Duration Per Play</p>
                        <h4 class="mb-0"></h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0 text-dark">{{ isset($aveDurationPerPlay) ? $aveDurationPerPlay : '' }}</p>
                </div>
            </div>
        </div>
    </div>
    
</div>
    </div>


@endsection