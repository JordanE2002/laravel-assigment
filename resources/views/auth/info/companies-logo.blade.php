@props(['company', 'width' => 100, 'height' => 100]) <!-- Default width and height are both 100 -->

@if ($company->logo && file_exists(storage_path('app/public/' . $company->logo)))
    <!-- Display the company's logo if it exists in storage -->
    <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo" width="{{ $width }}" height="{{ $height }}" />
@else
    <!-- Display the fallback image (random generated image) if no logo exists -->
    <img src="http://picsum.photos/seed/{{ rand(0, 10000) }}/{{ $height }}" alt="Company Logo" class="rounded-xl">
@endif
