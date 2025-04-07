@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Companies</h2>
    <div class="row">
        @forelse ($companies as $company)
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        @include('auth.info.companies-logo', ['width' => 100]) <!-- Company Logo -->

                        <h5 class="card-title mt-3">{{ $company->name }}</h5>
                        <p class="card-text"><strong>Email:</strong> {{ $company->email }}</p>
                        <p class="card-text">
                            <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a>
                        </p>

                        <!-- Delete Button -->
                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="mt-3">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                              
                                Delete
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        @empty
            <p>No companies found.</p>
        @endforelse
    </div>
</div>
@endsection