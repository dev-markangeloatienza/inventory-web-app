<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body>
    <div class="h-screen w-screen bg-layout ">
        
            <main class="max-w-[1600px] mx-auto">
                <div class="w-full h-screen bg-white ">
                    {{ $slot}}
                </div>
            </main>
        
    </div>
</body>

</html>