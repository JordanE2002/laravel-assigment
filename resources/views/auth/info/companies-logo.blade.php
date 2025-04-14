@if ($company->logo && str_starts_with($company->logo, 'http'))
    <img src="{{ $company->logo }}" alt="Company Logo" width="100" height="100">
@elseif ($company->logo && file_exists(storage_path('app/public/' . $company->logo)))
    <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo" width="100" height="100">
@else
    <img src="http://picsum.photos/seed/{{ rand(0, 10000) }}/100" alt="Company Logo" width="100" height="100">
@endif
