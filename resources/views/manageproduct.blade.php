<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manage Product</title>
        @vite(['resources/css/app.css','resources/js/app.js']) 
    </head>
    <body class="w-full h-screen flex flex-col flex-1">
        <div>
            @include('common/adminnavbar')
        </div>
        <div class="flex">
            @include("common/sidebar")
            <div class="mt-16 px-8 py-6 w-full">
                <div class="text-2xl font-semibold">
                    Manage Product
                </div>
                
                <div class="w-full my-4">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full ">
                        <table class="w-full text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Image
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Product name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Category
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Price
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Stock Quantity
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <img class="w-24 h-24" src="{{asset('storage/'.$product->productimage) }}" alt="">
                                    </th>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$product->productname}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$product->category}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$product->productprice}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$product->stockquantity}}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        <div class="flex gap-x-6">

                                            <a href="{{'/editproduct/'.$product->id}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                            <a href="{{'/deleteproduct/'.$product->id}}" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</a>
                                        </div>
                                    </td>
                                </tr>

                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>