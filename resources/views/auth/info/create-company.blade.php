@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create New Company</h2>

    <form method="POST" action="{{ route('companies.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Company Name*</label>
            <input type="text" class="form-control" id="name" name="name" required>
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Company Email</label>
            <input type="email" class="form-control" id="email" name="email">
            @error('email') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="logo" class="form-label">Company Logo (min 100x100)</label>
            <input type="file" class="form-control" id="logo" name="logo">
            @error('logo') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="website" class="form-label">Company Website</label>
            <input type="url" class="form-control" id="website" name="website">
            @error('website') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create Company</button>
    </form>
</div>
@endsection