@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Company') }}</div>

                <div class="card-body">
                    <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Company Name -->
                        <div class="form-group mb-3">
                            <label for="name">Company Name</label>
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $company->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Company Email -->
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $company->email) }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Website -->
                        <div class="form-group mb-3">
                            <label for="website">Website</label>
                            <input type="url" id="website" name="website" class="form-control @error('website') is-invalid @enderror" value="{{ old('website', $company->website) }}">
                            @error('website')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Logo (optional) -->
                        <div class="form-group mb-3">
                            <label for="logo">Company Logo</label>
                            <input type="file" id="logo" name="logo" class="form-control @error('logo') is-invalid @enderror">
                            @error('logo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <!-- Display current logo if it exists -->
                            @if ($company->logo)
                                <div class="mt-2">
                                    <label>Current Logo:</label>
                                    <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo" width="100">
                                </div>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group mb-3 text-end">
                            <button type="submit" class="btn btn-primary">Update Company</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection