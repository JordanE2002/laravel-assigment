@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Employees at {{ $company->name }}</h2>

    @if($employees->count())
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle shadow-sm">
                <thead class="table-dark">
                    <tr>
                      
                        <th scope="col">Full Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $index => $employee)
                        <tr>
                           
                            <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->phone_number }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info mt-4">
            No employees found for this company.
        </div>
    @endif

    <a href="{{ route('companies') }}" class="btn btn-secondary mt-4">
        ← Back to Companies
    </a>
</div>
@endsection
