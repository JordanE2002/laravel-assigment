@props(['action'])

<form method="GET" action="{{ $action }}" class="d-flex align-items-center">
    <label class="me-2">Sort by:</label>

    <select name="sort" onchange="this.form.submit()" class="form-select w-auto me-2">
        {{ $slot }}
    </select>

    <select name="order" onchange="this.form.submit()" class="form-select w-auto">
        <option value="asc" {{ request('order') === 'asc' ? 'selected' : '' }}>ASC</option>
        <option value="desc" {{ request('order') === 'desc' ? 'selected' : '' }}>DESC</option>
    </select>
</form>
