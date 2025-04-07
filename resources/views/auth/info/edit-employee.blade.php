@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Employee</h2>

    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" name="first_name" value="{{ old('first_name', $employee->first_name) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" name="last_name" value="{{ old('last_name', $employee->last_name) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" value="{{ old('email', $employee->email) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="company" class="form-label">Company</label>
            <input type="text" name="company" value="{{ old('company', $employee->company) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="phone_number" class="form-label">Phone</label>
            <input type="text" name="phone_number" value="{{ old('phone_number', $employee->phone_number) }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('employees') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection