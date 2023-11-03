<form action="{{ route('login') }}" method="post">
    @csrf
    <input type="email" name="email">
    <input type="password" name="password">
    <input type="submit">
</form>
