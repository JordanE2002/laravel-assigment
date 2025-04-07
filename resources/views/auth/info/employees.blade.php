@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Employees') }}</div>

                <div class="card-body">
                    <h3 class="mb-4">Employee List</h3>

                    <div class="row">
                        @foreach ($employees as $employee)
                            <div class="col-md-6 mb-4">
                                <!-- Clickable card -->
                                <a href="{{ route('employees.edit', $employee->id) }}" class="text-decoration-none text-dark">
                                    <div class="card shadow-sm h-100 hover-shadow">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $employee->first_name }} {{ $employee->last_name }}</h5>
                                            <p class="card-text"><strong>Email:</strong> {{ $employee->email }}</p>
                                            <p class="card-text"><strong>Company:</strong> {{ $employee->company }}</p>
                                            <p class="card-text"><strong>Phone:</strong> {{ $employee->phone_number }}</p>

                                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="mt-2">
                                     @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                              
                                Delete
                            </button>
                        </form>
                                        </div>
                                    </div>
                                </a>

                                <!-- Delete button below the card -->
                        
                                </form>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination Links -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $employees->links('vendor.pagination.bootstrap-5') }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
