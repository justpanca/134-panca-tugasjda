<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>mottor</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
        @vite('resources/css/app.css')
    </head>
    <body class="bg-white text-erentBlack">
        @if (session()->get('isLogged'))
            @include("partials.header")
        @endif
        <main class="w-full min-h-screen pt-[65px] flex flex-col items-center gap-4">
            @yield("content")
        </main>
        @if (session()->get('isLogged'))
            @include("partials.footer")
        @endif
    </body>
</html>
