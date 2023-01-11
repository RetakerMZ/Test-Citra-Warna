@extends('layouts.app')



@section('content')
<div class="container">
    <h2>Employees</h2>
    <a href="/employees/create" class="btn mb-3 btn-primary">Create New Employees</a>
    @if (session()->has('success'))
        <div class="alert alert-primary" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Company ID</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($employe as $employes)
                <tr>
                    <th scope="row">{{ $employes -> id }}</th>
                    <td>{{ $employes -> name }}</td>
                    <td>{{ $employes -> companyId }}</td>
                    <td>{{ $employes -> email }}</td>
                    <td>
                        <a href="/employees/{{ $employes->id }}/edit" class="btn bg-warning">Update</a>
                        <form action="/employees/{{ $employes->id }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn bg-danger bordeer-0" onclick="return confirm('Apakah kamu yakin ?')"><a>Delete</a></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
      {{ $employe->links() }}
</div>
@endsection

