<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Overview</title>
    @vite(['resources/css/app.css','resources/js/app.js'])  
</head>
<body class="w-full h-screen flex flex-col flex-1">
    @include('common/navbar')
    <div class="flex mt-16 px-20">
        <div class="basis-1/2">
            <img class="w-full" src="{{asset('storage/'.$product->productimage) }}" alt="">
        </div>
        <div class="m-20 basis-1/2">
            <div class=" flex flex-col gap-4 justify-start">
                <h1 class="text-3xl font-bold">{{$product->productname}}</h1>
                <div class="flex gap-x-3">
                    <p class="text-xl font-extralight"> 
                        -{{ceil($product->discountamount/$product->productprice*100)}}%
                    </p>
                    <p class="text-xl font-light"> 
                        <sup>
                            ₹
                        </sup>
                         {{$product->productprice-$product->discountamount}}
                    </p>
                </div>
                <div class="flex gap-x-2 text-sm">
                    MRP: <span class="line-through font-light">₹ {{$product->productprice}}</span>
                </div>
                <div class="flex gap-x-4 my-4">
                    <button class="border py-2 rounded bg-[#ffd814] w-32">Buy Now</button>
                    <button class="border py-2 rounded bg-[#FFA41C] w-32">Add to Cart</button>
                </div>
                <div class=" flex flex-col gap-4">
                    <p class="text-lg">Description:</p>
                    <p class="w-full text-base">{{$product->productdescription}}</p>
                </div>
                <div class="my-4 flex flex-col gap-3">
                    <div class="w-1/2 flex justify-between ">
                        <p class="font-medium">Manufacturer</p>
                        <p>{{$product->manufacturer}}</p>
                    </div>
                    <div class="w-1/2 flex justify-between ">
                        <p class="font-medium">Category</p>
                        <p>{{$product->category}}</p>
                    </div>
                    <div class="w-1/2 flex justify-between">
                        <p class="font-medium">Stock Quantity</p>
                        <p>{{$product->stockquantity}}</p>
                    </div>
                </div>
            </div>
           
        </div>

    </div>
    <!-- <div class=" px-24  py-10">
        <div class="grid grid-cols-2 gap-6 mt-4">

            <div>
                <img src="{{asset('storage/'.$product->productimage) }}" class="h-[30rem] w-[30rem]" alt="">
            </div>
            <div>
                <h1 class="text-2xl font-semibold">{{$product->productname}}</h1>
                <p class="text-xl font-semibold mt-2 text-red-500">{{$product->manufacturer}}</p>
                <p class="text-xl font-semibold mt-2">{{$product->category}}</p>
                <p class="text-xl font-normal mt-2">{{$product->productdescription}}</p>
                <p class="text-xl font-semibold mt-2">{{$product->discountamount}}</p>
                <p class="text-xl font-semibold line-through mt-2">${{$product->productprice}}</p>
                
                <button type="button" class="focus:outline-none text-white bg-yellow-400 w-52 mt-5 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-3xl text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Buy Now</button>
            </div>
        </div>
    </div> -->
</body>
</html>