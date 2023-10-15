<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Product</title>
        @vite(['resources/css/app.css','resources/js/app.js']) 
    </head>
    <body class="w-full h-screen flex flex-col flex-1">
        @include('common/adminnavbar')
        <div class="flex w-full">
            @include("common/sidebar")
            <div class="mt-16 px-8 py-6 w-1/2 ">
                <div class="text-2xl font-semibold">
                    Update Product
                </div>
                <form action="{{'/editproduct/'.$product->id}}" method="post" enctype="multipart/form-data">
                    <div class="mt-6 mb-4 flex flex-col gap-4">
                        @csrf
                        <div class="flex flex-col gap-1">
                            <label for="productname">Product Name</label>
                            <input value="{{$product->productname}}" name="productname" id="productname" class="rounded-md p-2 border-2 border-gray-900/10 focus:ring-0 focus:border-gray-500" type="text" placeholder="Product Name" required>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="productdescription">Product Description</label>
                            <textarea class="rounded-md p-2 border-2 border-gray-900/10 focus:ring-0 focus:border-gray-500" name="productdescription" id="productdescription" cols="30" rows="10">
                            {{$product->productdescription}}
                            </textarea>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="productprice">Product Price</label>
                            <input value="{{$product->productprice}}" name="productprice" id="productprice" class="rounded-md p-2 border-2 border-gray-900/10 focus:ring-0 focus:border-gray-500" type="text" placeholder="Product Price" required>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="stockquantity">Stock Quantity</label>
                            <input value="{{$product->stockquantity}}" name="stockquantity" id="stockquantity" class="rounded-md p-2 border-2 border-gray-900/10 focus:ring-0 focus:border-gray-500" type="text" placeholder="Stock Quantity" required>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="discountamount">Discount Amount</label>
                            <input value="{{$product->discountamount}}" name="discountamount" id="discountamount" class="rounded-md p-2 border-2 border-gray-900/10 focus:ring-0 focus:border-gray-500" type="text" placeholder="Discount Amount" required>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="category">Category</label>
                            <input value="{{$product->category}}" name="category" id="category" class="rounded-md p-2 border-2 border-gray-900/10 focus:ring-0 focus:border-gray-500" type="text" placeholder="Discount Amount" required>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="manufacturer">Manufacturer</label>
                            <input value="{{$product->manufacturer}}" name="manufacturer" id="manufacturer" class="rounded-md p-2 border-2 border-gray-900/10 focus:ring-0 focus:border-gray-500" type="text" placeholder="Manufacturer" required>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="productimage">Upload file</label>
                            <input name="productimage" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="productimage" id="productimage" type="file">
                        </div>
                    </div>
                    <button class="bg-slate-900 text-white font-medium py-2 px-4 rounded-md hover:bg-slate-600" type="submit">Update</button>
                </form>
            </div>
        </div>
    </body>
</html>