@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Companies') }}</div>

                <div class="card-body">
                    <h3 class="mb-4">Company List</h3>

                    <div class="mb-4 text-end">
                        <a href="{{ route('companies.create') }}" class="btn btn-primary">
                            + Create New Company
                        </a>
                    </div>

                    <div class="row">
                        @forelse ($companies as $company)
                            <div class="col-md-6 mb-4">
                                <!-- Card -->
                                <div class="card shadow-sm h-100">
                                    <div class="card-body text-center">
                                        @include('auth.info.companies-logo', ['width' => 100])

                                        <h5 class="card-title mt-3">{{ $company->name }}</h5>
                                        <p class="card-text"><strong>Email:</strong> {{ $company->email }}</p>
                                        <p class="card-text">
                                            <strong>Website:</strong>
                                            <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a>
                                        </p>

                                        <!-- Edit Button -->
                                        <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-sm btn-warning">
                                            Edit
                                        </a>

                                        <!-- Delete Button -->
                                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="mt-2">
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

                    <!-- Pagination Links -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $companies->links('vendor.pagination.bootstrap-5') }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
