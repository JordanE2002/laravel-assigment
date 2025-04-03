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
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $employee->first_name }} {{ $employee->last_name }}</h5>
                                        <p class="card-text"><strong>Email:</strong> {{ $employee->email }}</p>
                                        <p class="card-text"><strong>Company:</strong> {{ $employee->company }}</p>
                                        <p class="card-text"><strong>Phone:</strong> {{ $employee->phone_number }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

