<form action="{{ route('category.update', $category->id) }}" method="post">
    @method('put')
    @csrf
    <input type="text" name="name" value="{{ $category->name }}">
    @error('name')
        <p>{{ $message }}</p>
    @enderror
    <input type="submit">
</form>
