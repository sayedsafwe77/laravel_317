<form action="{{ route('category.store') }}" method="post">
    @csrf
    <input type="text" name="name" value="{{ old('name') }}">
    @error('name')
        <p>{{ $message }}</p>
    @enderror
    <input type="submit">
</form>
