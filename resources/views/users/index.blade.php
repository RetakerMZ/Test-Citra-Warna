@extends('layouts.app')



@section('content')
<div class="container">
    <h2>Users</h2>
    <a href="/users/create" class="btn mb-3 btn-primary">Create New Users</a>
    @if (session()->has('success'))
        <div class="alert alert-primary" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Username</th>
            <th scope="col">Password</th>
            <th scope="col">Level</th>
            <th scope="col">Employe Id</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($user as $users)
                <tr>
                    <th scope="row">{{ $users -> id }}</th>
                    <td>{{ $users -> username }}</td>
                    <td>{{ $users -> password }}</td>
                    <td>{{ $users -> level }}</td>
                    <td>{{ $users -> employeId }}</td>
                    <td>
                        <a href="/users/{{ $users->id }}/edit" class="btn bg-warning">Update</a>
                        <form action="/users/{{ $users->id }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn bg-danger bordeer-0" onclick="return confirm('Apakah kamu yakin ?')"><a>Delete</a></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
      {{ $user->links() }}
</div>
@endsection
