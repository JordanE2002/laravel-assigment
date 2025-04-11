@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Companies') }}</div>

                <div class="card-body">
                    <x-header>Company List</x-header>

                    <!-- Create -->
                    <x-create-button 
    :route="route('companies.create')" 
    label="Create New Company" 
/>
                            <!-- Sort -->
                        <x-sort-form :action="route('companies')">
                            <option value="name" {{ request('sort') === 'name' ? 'selected' : '' }}>Name</option>
                            <option value="email" {{ request('sort') === 'email' ? 'selected' : '' }}>Email</option>
                            <option value="website" {{ request('sort') === 'website' ? 'selected' : '' }}>Website</option>
                        </x-sort-form>
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

                                        <!-- Buttons -->
                                        <div class="d-flex justify-content-center gap-2 mt-3 flex-wrap">
                                            <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>

                                            <a href="{{ route('companies.employees', $company->id) }}" class="btn btn-sm btn-info">View Employees</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>No companies found.</p>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <x-pagination-wrapper>
                        {{ $companies->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}
                    </x-pagination-wrapper>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection