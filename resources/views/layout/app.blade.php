<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>To Do</title>
</head>
<style>
    input, textarea, button, .btn {
        border: 1px solid black !important;
        border-radius: 8px;
        padding: 4px 8px !important;
    }
</style>
<body class='text-center w-screen'>
    <header class='flex m-3 p-3 items-center justify-start border-b border-b-grey'>
        <h1 class='text-4xl font-bold hover:text-5xl transition-all'><a href='{{ route('main') }}'>To Do</a></h1>
    </header>
    <h2 class='font-bold text-3xl'>@yield('heading')</h2>
    <main class='flex flex-col gap-3'>
        @if (session()->has('success'))
            <div class='my-3 font-bold text-green-500'>{{session('success')}}</div>
        @endif

        @yield('content')
    </main>
</body>
</html>