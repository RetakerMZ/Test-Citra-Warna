@extends('layouts.app')



@section('content')
<div class="container">
    <h2>Edit Companies</h2>
    <div class="col-lg-8">
        <form method="POST" action="/companies/{{ $company->id }}" class="mb-5" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value={{ old('name', $company->name) }}>
            </div>
            @error('name')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value={{ old('email', $company->email) }}>
            </div>
            @error('email')
            <div class="text-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="mb-3">
                <label for="logo" class="form-label">Logo</label>
                <input class="form-control @error('logo') is-invalid @enderror" type="file" id="logo" name="logo">
            </div>
            @error('logo')
            <div class="text-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="mb-3">
                <label for="website" class="form-label">Website</label>
                <input type="text" class="form-control @error('website') is-invalid @enderror" id="website" name="website" value={{ old('website',$company->website) }}>
            </div>
            @error('website')
            <div class="text-danger">
                {{ $message }}
            </div>
            @enderror
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</div>
@endsection
