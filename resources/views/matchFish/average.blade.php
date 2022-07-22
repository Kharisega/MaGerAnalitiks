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
            <h6>Rata-rata Per Hari</h6>
            <form action="{{ route('matchFish_exportcsvPerDay') }}" method="POST">
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
                        <button class="btn btn-success" type="submit">Export CSV</button>
                    </div>
                </div>
            </form>
        </div>
    </div><br>
    
    <div class="row">
        <div class="col">
            <h6>Rata-rata Per Range</h6>
            <form action="{{ route('matchFish_exportcsvPerWeek') }}" method="POST">
                @csrf
                <div class="row row-md-5">
                    <div class="col col-md-6">
                        <div class="row">
                            <div class="col form-group">
                                <label for="date1">Dari tanggal :</label>
                                <input type="date" name="date1" id="date1" class="form-control" required>
                            </div>
                            <div class="col form-group">
                                <label for="date2">Sampai tanggal :</label>
                                <input type="date" name="date2" id="date2" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-5" style="position:relative; left:60px; top: 32px;">
                        <button class="btn btn-success" type="submit">Export CSV</button>
                    </div>
                </div>
            </form>
        </div>
    </div><br>

    <div class="row">
        <div class="col">
            <h6>Rata-rata Per Tahun</h6>
            <form action="{{ route('matchFish_exportcsvPerYear') }}" method="POST">
                @csrf
                <div class="row row-md-5">
                    <div class="col col-md-6">
                        <select name="year" id="year" class="form-select">
                            @for ($i = 1998; $i < 2500; $i++)
                                <option value="{{ $i }}" {{ ($i == date("Y")) ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col col-md-5" style="position:relative; left:60px;">
                        <button class="btn btn-success" type="submit">Export CSV</button>
                    </div>
                </div>
            </form>
        </div>
    </div><br>
</div>
</div>


@endsection
