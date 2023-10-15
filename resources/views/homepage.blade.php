<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage | ByteBazaar</title>
    @vite(['resources/css/app.css','resources/js/app.js']) 
</head>
<body class="w-full h-screen flex flex-col flex-1">
    @include('common/navbar')
    <div class="mt-16 px-24 p-8">
        <h1 class="text-2xl font-semibold">
            Trending Products
        </h1>
        <section class="p-2 my-4 flex gap-6 flex-wrap">
        @foreach($products as $product)
            @include('common/productcard', ['product' => $product])
        @endforeach
        </section>
    </div>
    
</body>
</html>