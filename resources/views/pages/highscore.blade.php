@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-12 ">
          <div class="panel panel-default">
              <div class="panel-heading">Highscore</div>
              <div class="panel-body">
                <table class="table">
                  <thead>
                    <th>id</th>
                    <th>name</th>
                    <th>punkte</th>
                    <th>created_at</th>
                    <th>updated_at</th>

                  </thead>
                  <tbody>
                    @foreach($highscores as $highscore)
                    <tr>
                      <td>{{ $highscore->id }}</td>
                      <td>{{ $highscore->name }}</td>
                      <td>{{ $highscore->punkte }}</td>
                      <td>{{ $highscore->created_at }}</td>
                      <td>{{ $highscore->updated_at }}</td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>
                <div class="text-center">
                  {!! $highscores->links() !!}
                </div>

              </div>
          </div>
      </div>
  </div>
</div>
@endsection
