<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="row mt-5">
        <div class="col-10 offset-1">
            <h2>Users table</h2>
            <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3 mb-3">Back</a>
            @can('create')
                <a href="{{ route('create') }}" class="btn btn-primary mt-3 mb-3">Create</a>
            @endcan
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">email</th>
                        @can('read')
                            <th scope="col">Show</th>
                        @endcan
                        @can('update')
                            <th scope="col">Edit</th>
                        @endcan
                        @can('delete')
                            <th scope="col">Delete</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th>{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            @can('read')
                                <td>
                                    <a href="{{ route('read') }}" class="btn btn-primary mt-3 mb-3">Show</a>
                                </td>
                            @endcan
                            @can('update')
                                <td>
                                    <a href="{{ route('update') }}" class="btn btn-primary mt-3 mb-3">Edit</a>
                                </td>
                            @endcan
                            @can('delete')
                                <td>
                                    <a href="{{ route('delete') }}" class="btn btn-primary mt-3 mb-3">Delete</a>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
