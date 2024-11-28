<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Result Brains College | Best Computer College in Lahore</title>
    <meta name="title" content="Result Brains College | Best Computer College in Lahore">
    <meta name="description" content="Brains College is a leading computer college in Lahore, offering courses in computer science, IT, and robotics. Enroll today and unlock your potential in technology.">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://result.brainscollege.edu.pk" />
    <link rel="icon" href="https://brainscollege.edu.pk/assets/images/favicons/apple-touch-icon.png">

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://result.brainscollege.edu.pk">
    <meta property="og:title" content="Result Brains College | Best Computer College in Lahore">
    <meta property="og:description" content="Brains College is a leading computer college in Lahore, offering courses in computer science, IT, and robotics. Enroll today and unlock your potential in technology.">

    <meta property="og:image" content="https://brainscollege.edu.pk/assets/images/resources/logo-1.png">
    <meta property="og:image:secure_url" content="https://brainscollege.edu.pk/assets/images/resources/logo-1.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="600">
    <meta property="og:image:height" content="315">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Funnel+Display:wght@300..800&family=Outfit:wght@100..900&display=swap');
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('results.index') }}">
                <img src="https://brainscollege.edu.pk/assets/images/resources/logo-1.png" alt="Logo" width="auto" height="70" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('results.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
