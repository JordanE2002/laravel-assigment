@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Companies') }}</div>

                <div class="card-body">
                <x-header>Company</x-header>

                    <!-- Create Button -->
                    <div class="mb-4 d-flex justify-content-between align-items-center">
                        <a href="{{ route('companies.create') }}" class="btn btn-primary">
                            + Create New Company
                        </a>

                        <!-- Sort Form -->
                        <form method="GET" action="{{ route('companies') }}" class="d-flex align-items-center">
                            <label class="me-2">Sort by:</label>
                            <select name="sort" onchange="this.form.submit()" class="form-select w-auto me-2">
                                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name</option>
                                <option value="email" {{ request('sort') == 'email' ? 'selected' : '' }}>Email</option>
                                <option value="website" {{ request('sort') == 'website' ? 'selected' : '' }}>Website</option>
                            </select>

                            <select name="order" onchange="this.form.submit()" class="form-select w-auto">
                                <option value="asc" {{ request('order') == 'asc' ? 'selected' : '' }}>ASC</option>
                                <option value="desc" {{ request('order') == 'desc' ? 'selected' : '' }}>DESC</option>
                            </select>
                        </form>
                    </div>

                    <!-- Company Cards -->
                    <div class="row">
                        @forelse ($companies as $company)
                            <div class="col-md-6 mb-4">
                                <div class="card shadow-sm h-100">
                                    <div class="card-body text-center">
                                        @include('auth.info.companies-logo', [
                                            'company' => $company,
                                            'width' => 100,
                                            'height' => 100
                                        ])

                                        <h5 class="card-title mt-3">{{ $company->name }}</h5>
                                        <p class="card-text"><strong>Email:</strong> {{ $company->email }}</p>
                                        <p class="card-text">
                                            <strong>Website:</strong>
                                            <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a>
                                        </p>

                                        <!-- Buttons Row -->
                                        <div class="d-flex justify-content-center gap-2 mt-3 flex-wrap">
                                            <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-sm btn-warning">
                                                Edit
                                            </a>

                                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    Delete
                                                </button>
                                            </form>

                                            <a href="{{ route('companies.employees', $company->id) }}" class="btn btn-sm btn-info">
                                                View Employees
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>No companies found.</p>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $companies->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
