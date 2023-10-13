    @extends('adminlte::page')
    @section('content')
        <table class="table">

            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>gender</th>
                    <th>salary</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->gender }}</td>
                        <td>{{ $user->salary }}</td>
                        <td>
                            <a href=""></a>
                            <x-delete-button action="{{ route('category.destroy', $user->id) }}" :model="$user" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    @endsection
