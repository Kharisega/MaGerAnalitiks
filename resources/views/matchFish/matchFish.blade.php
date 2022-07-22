@extends('layouts.sidebar')

@section('content')
<style>
    body {
        font-family: 'Nunito';
    }

    table {
        display: block;
        overflow-x: scroll;
    }

</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<div class="container">

    <center class="py-2">
        <h4>Event Golden Malam Match Fish</h4>
    </center>
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Maaf</strong> Data yang anda inputkan bermasalah.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if ($message = Session::get('error'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
    @endif

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <button type="button" class="btn btn-primary mr-5 mb-4" data-toggle="modal" data-target="#importCSV">
        IMPORT CSV
    </button>

    <!-- Import CSV -->
    <div class="modal fade text-dark" id="importCSV" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{ route('matchFish_importcsv') }}" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                    </div>
                    <div class="modal-body">

                        {{ csrf_field() }}

                        <label>Pilih file excel</label>
                        <div class="form-group">
                            <input type="file" name="file" accept="text/csv" required="required">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <button type="button" class="btn btn-primary mr-5 mb-4" data-toggle="modal" data-target="#importExcel">
        IMPORT EXCEL
    </button>

    <!-- Import Excel -->
    <div class="modal fade text-dark" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{ route('matchFish_importexcel') }}" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                    </div>
                    <div class="modal-body">

                        {{ csrf_field() }}

                        <label>Pilih file excel</label>
                        <div class="form-group">
                            <input type="file" name="file" required="required">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <a href="{{ route('matchFish_exportcsv') }}" class="btn btn-success" style="margin-top: -25px;">Export CSV</a>


    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Event Name</th>
                <th>Event Version</th>
                <th>Golden Ticket</th>
                <th>Play Duration</th>
                <th>Play Time</th>
                <th>Player ID</th>
                <th>Score</th>
                <th>Silver Ticket</th>
                <th>Stars</th>
                <th>Timestamp</th>
                <th>Duration Per Play</th>
                <th>Free Per Ticket</th>
                <th>Silver Per Ticket</th>
                <th>Golden Per Ticket</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach($matchFish as $fish)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{$fish->eventName}}</td>
                <td>{{$fish->eventVersion}}</td>
                <td>{{$fish->goldenTicket}}</td>
                <td>{{$fish->playDuration}}</td>
                <td>{{$fish->playTime}}</td>
                <td>{{$fish->playerID}}</td>
                <td>{{$fish->score}}</td>
                <td>{{$fish->silverTicket}}</td>
                <td>{{$fish->stars}}</td>
                <td>{{$fish->timestamp}}</td>
                <td>{{$fish->durationPerPlay}}</td>
                <td>{{$fish->freePerTicket}}</td>
                <td>{{$fish->silverPerTicket}}</td>
                <td>{{$fish->goldenPerTicket}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $matchFish->links() !!}
</div>
</div>
@endsection
