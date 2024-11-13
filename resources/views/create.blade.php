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
            <a href="{{ route('user.index') }}" class="btn btn-primary mt-3 mb-3">Back</a>
            <form action="{{ route('car.create') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Car Name</label>
                    <input type="text" name="name" class="form-control" id="name"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="model" class="form-label">Model</label>
                    <input type="text" name="model" class="form-control" id="model">
                </div>
                <div class="mb-3">
                    <label for="year" class="form-label">Year</label>
                    <input type="number" name="year" class="form-control" id="year">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
