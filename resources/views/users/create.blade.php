@extends('layouts.app')



@section('content')
<div class="container">
    <h2>Create New Users</h2>
    <div class="col-lg-8">
        <form method="POST" action="/users" class="mb-5">
            @csrf
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value={{ old('username') }}>
            </div>
            @error('username')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value={{ old('password') }}>
            </div>
            @error('password')
            <div class="text-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="mb-3">
                <label for="level" class="form-label">Level</label>
                <select class="form-select" name="level">
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>
            @error('level')
            <div class="text-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="mb-3">
                <label for="employeId" class="form-label">Employe ID</label>
                <select class="form-select" name="employeId">
                    @foreach ($employe as $employe)
                        @if (old('employeId') == $employe->id)
                            <option value="{{ $employe->id }}" selected>{{ $employe->name }}</option>
                        @else
                            <option value="{{ $employe->id }}">{{ $employe->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            @error('employeId')
            <div class="text-danger">
                {{ $message }}
            </div>
            @enderror
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</div>
@endsection
