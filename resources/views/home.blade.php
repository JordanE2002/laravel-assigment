@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Basic Stats Section -->
    <div class="row text-center mb-4">
        @foreach ([
            ['title' => 'Total Companies', 'count' => \App\Models\Companies::count()],
            ['title' => 'Total Employees', 'count' => \App\Models\Employees::count()],
        ] as $stat)
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $stat['title'] }}</h5>
                    <p class="display-6">{{ $stat['count'] }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Most Recent Companies Section -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Most Recent Companies</h5>
                    <ul class="list-group">
                        @foreach(\App\Models\Companies::latest()->take(5)->get() as $company)
                            <li class="list-group-item">
                                {{ $company->name }} - {{ $company->created_at->format('l, d, Y') }}
                            </li>
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
                            <li class="list-group-item">
                                {{ $employee->first_name }} {{ $employee->last_name }} - {{ $employee->created_at->format('M d, Y') }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection