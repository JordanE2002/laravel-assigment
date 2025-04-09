@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>{{ __('You are logged in!') }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Basic Stats Section -->
    <div class="row text-center">
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Companies</h5>
                    <p class="display-6">{{ \App\Models\Companies::count() }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Employees</h5>
                    <p class="display-6">{{ \App\Models\Employees::count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Most Recent Companies Section -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Most Recent Companies</h5>
                    <ul class="list-group">
                        @foreach(\App\Models\Companies::latest()->take(5)->get() as $company)
                            <li class="list-group-item">{{ $company->name }} - {{ $company->created_at->format('M d, Y') }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Most Recent Employees Section -->
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Most Recent Employees</h5>
                    <ul class="list-group">
                        @foreach(\App\Models\Employees::latest()->take(5)->get() as $employee)
                            <li class="list-group-item">{{ $employee->first_name }} {{$employee->last_name }} -  {{ $employee->created_at->format('M d, Y') }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
