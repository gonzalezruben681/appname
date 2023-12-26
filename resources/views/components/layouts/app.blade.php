<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Enlace al CDN de jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <title>{{$title ?? ''}}</title>
    @vite(['resources/js/app.js'])
</head>

<body class="antialiased bg-slate-100 dark:bg-slate-900">

{{--@include('partials.navigation')--}}

<!-- contenido variable !-->
<!-- slot es igual al yield !-->
{{--@yield('content')--}}
<x-layouts.navigation />

@if (session('status'))
<div class="max-w-screen-xl px-3 py-2 mx-auto font-bold text-white sm:px-6 lg:px-8 bg-emerald-500 dark:bg-emerald-700">
    {{ session('status') }}
</div>
@endif

{{$slot }}
</body>
</html>
