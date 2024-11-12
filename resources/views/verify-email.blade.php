<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="background-color: rgb(32, 31, 31)">
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3" style="background-color:aliceblue;margin-top:30vh;border-radius:20px">
                <a type="submit" href="{{ route('dashboard') }}" class="btn btn-primary mb-5 mt-3">Back</a>
                <form action="{{ route('email.verify') }}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <label for="code" class="form-label">verification that sent to your registered
                            email</label>
                        <input type="number" class="form-control" name="code" id="code">
                    </div>
                    <button type="submit" class="btn btn-primary mb-5">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
