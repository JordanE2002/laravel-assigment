@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Employees at {{ $company->name }}</h2>

    @if($employees->count())
        <ul class="list-group mt-4">
            @foreach($employees as $employee)
                <li class="list-group-item">
                    {{ $employee->first_name }} {{ $employee->last_name }} - {{ $employee->email }} - {{ $employee->phone_number }}
                </li>
            @endforeach
        </ul>
    @else
        <p class="mt-4">No employees found for this company.</p>
    @endif

    <a href="{{ route('companies') }}" class="btn btn-secondary mt-4">← Back to Companies</a>
</div>
@endsection