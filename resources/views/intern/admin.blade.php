@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
          @if (Session::has('message'))
            <div class="alert alert-info">
              {{ Session::get('message') }}
              {{ Session::get('user') }}
              <ul>

              @foreach (Session::get('role') as $role)
                <li>
                  {{ $role }}
                </li>
              @endforeach
              </ul>

             </div>
          @endif
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
                    <th>User</th>
                    <th>Author</th>
                    <th>Admin</th>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                    <tr>
                      <form action="/intern/admin/assign-roles" method="post">
                        <div class="form-group">
                          <td>{{ $user->id }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}<input type="hidden" name="email" value="{{ $user->email }}"></td>
                          <td>{{ $user->verified }}</td>
                          <td>{{ $user->created_at }}</td>
                          <td>{{ $user->updated_at }}</td>
                          <td><input type="checkbox" name="role_user" {{ $user->hasRole('user') ? 'checked' : '' }}></td>
                          <td><input type="checkbox" name="role_author" {{ $user->hasRole('author') ? 'checked' : '' }}></td>
                          <td><input type="checkbox" name="role_admin" {{ $user->hasRole('admin') ? 'checked' : '' }}></td>

                          <td><button type="submit" class="btn-xs btn-default">Assign Roles</button> </td>
                          {{ csrf_field() }}
                        </div>

                      </form>
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
