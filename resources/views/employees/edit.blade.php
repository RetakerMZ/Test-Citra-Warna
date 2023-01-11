@extends('layouts.app')



@section('content')
<div class="container">
    <h2> Edit Employees</h2>
    <div class="col-lg-8">
        <form method="POST" action="/employees/{{ $employe->id }}" class="mb-5">
            @method('PUT')
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value={{ old('name', $employe->name) }}>
            </div>
            @error('name')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value={{ old('email', $employe->email )}}>
            </div>
            @error('email')
            <div class="text-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="mb-3">
                <label for="companyId" class="form-label">Company ID</label>
                <input type="number" class="form-control @error('companyId') is-invalid @enderror" id="companyId" name="companyId" value={{ old('companyId', $employe->companyId) }}>
            </div>
            @error('companyId')
            <div class="text-danger">
                {{ $message }}
            </div>
            @enderror
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</div>
@endsection
