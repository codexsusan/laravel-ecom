<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        @vite(['resources/css/app.css','resources/js/app.js']) 
    </head>
    <body class="w-full h-screen flex flex-col flex-1">
        <div>
            @include('common/adminnavbar')
        </div>
        <div class="flex">
            @include("common/sidebar")
            <div class="mt-16 px-8 py-6">
                <div class="text-2xl font-semibold">
                    Dashboard
                </div>
            </div>
        </div>
    </body>
</html>