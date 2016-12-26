@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">Admin Area Users</div>
              <div class="panel-body">
                <table class="table">
                  <thead>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>verified</th>
                    <th>created_at</th>
                    <th>updated_at</th>

                  </thead>
                  <tbody>
                    @foreach($users as $user)
                    <tr>
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->verified }}</td>
                      <td>{{ $user->created_at }}</td>
                      <td>{{ $user->updated_at }}</td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>


              </div>
            </div>
        </div>
    </div>
</div>
@endsection
