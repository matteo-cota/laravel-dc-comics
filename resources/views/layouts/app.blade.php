<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DC Comics Archive</title>
    @vite(['resources/css/app.scss']) <!-- Include CSS con Vite -->
</head>

<body>
    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>



    <footer>
        <p>&copy; 2024 DC Comics Archive</p>
    </footer>

    @vite(['resources/js/app.js']) <!-- Include JS con Vite -->
</body>
</html>
