<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Brand Names Generator</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body class="gradient-body">
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">

                @if (Session::has('success'))
                <div class="alert alert-success mb-3">{{ Session::get('success') }}</div>
                @endif

                <h3 class="mb-4">Hi Admin</h3>

                <form action="{{ route('config.update') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="form-label" for="number_of_chars">Limit Responses to Charaters</label>
                        <input type="number" value="{{ $number_of_chars->value }}" placeholder="Enter number of characters" class="form-control"
                            id="number_of_chars" name="number_of_chars" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="number_of_results">Display Results</label>
                        <input type="number" placeholder="Enter number of results" class="form-control"
                            id="number_of_results" value="{{ $number_of_results->value }}" name="number_of_results" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>


    </div>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>