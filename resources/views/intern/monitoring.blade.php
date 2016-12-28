@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Monitoring Bereich</div>

                <div class="panel-body">
                    <strong>Hier Socket</strong>
                    <br>
                    <br>
                    <p> - hier mittels socket.io die messages vom javafx "client" anzeigen</p>
                    <p> - der socket server ist ein redis</p>
                    <p> - die laravel app ist ein client</p>
                    <p> - broadcast events</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
