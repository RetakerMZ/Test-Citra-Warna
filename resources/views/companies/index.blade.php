@extends('layouts.app')



@section('content')
<div class="container">
    <h2>Companies</h2>
    <a href="/companies/create" class="btn mb-3 btn-primary">Create New Companies</a>
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
            <th scope="col">Email</th>
            <th scope="col">Logo</th>
            <th scope="col">Website</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($company as $companys)
                <tr>
                    <th scope="row">{{ $companys -> id }}</th>
                    <td>{{ $companys -> name }}</td>
                    <td>{{ $companys -> email }}</td>
                    <td>{{ $companys -> logo }}</td>
                    <td>{{ $companys -> website }}</td>
                    <td>
                        <a href="/companies/{{ $companys->id }}/edit" class="btn bg-warning">Update</a>
                        <form action="/companies/{{ $companys->id }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn bg-danger bordeer-0" onclick="return confirm('Apakah kamu yakin ?')"><a>Delete</a></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
      {{ $company->links() }}
</div>
@endsection
