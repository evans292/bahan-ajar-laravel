<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? 'app.name' }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/auth.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/auth.js') }}" defer></script>
        <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        /* Firefox */
        input[type=number] {
        -moz-appearance: textfield;
        }
        </style>
    </head>
    <body>
        {{ $slot }}


        {{ $script ?? '' }}
    </body>
</html>
