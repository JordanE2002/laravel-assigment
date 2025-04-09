@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Employees') }}</div>

                <div class="card-body">
                   <x-header>Employee List</x-header>

                    <!-- Create New Employee -->
                    <div class="mb-4 text-end">
                        <a href="{{ route('employees.create') }}" class="btn btn-primary">
                            + Create New Employee
                        </a>

                        
                        <!-- Sort Form -->
                        <form method="GET" action="{{ route('employees') }}" class="d-flex align-items-center">
                            <label class="me-2">Sort by:</label>
                            <select name="sort" onchange="this.form.submit()" class="form-select w-auto me-2">
                                <option value="first_name" {{ request('sort') == 'first_name' ? 'selected' : '' }}>First name</option>
                                <option value="last_name" {{ request('sort') == 'last_name' ? 'selected' : '' }}>Last name</option>
                                <option value="email" {{ request('sort') == 'email' ? 'selected' : '' }}>email</option>
                            </select>

                            <select name="order" onchange="this.form.submit()" class="form-select w-auto">
                                <option value="asc" {{ request('order') == 'asc' ? 'selected' : '' }}>ASC</option>
                                <option value="desc" {{ request('order') == 'desc' ? 'selected' : '' }}>DESC</option>
                            </select>
                        </form>
                    </div>

                    <!-- Employee Cards -->
                    <div class="row">
                        @foreach ($employees as $employee)
                            <div class="col-md-6 mb-4">
                                <div class="card shadow-sm h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $employee->first_name }} {{ $employee->last_name }}</h5>
                                        <p class="card-text"><strong>Email:</strong> {{ $employee->email }}</p>
                                        <p class="card-text"><strong>Company:</strong> 
                                            {{ $employee->company ? $employee->company->name : 'No company associated' }}
                                        </p>
                                        <p class="card-text"><strong>Phone:</strong> {{ $employee->phone_number }}</p>

                                        <!-- Buttons Row -->
                                        <div class="d-flex justify-content-start gap-2 mt-3 flex-wrap">
                                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-warning">
                                                Edit
                                            </a>

                                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $employees->links('vendor.pagination.bootstrap-5') }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection