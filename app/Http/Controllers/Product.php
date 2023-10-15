<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class Product extends Controller
{

    public function addProduct(Request $request)
    {
        $productname = $request->input("productname");
        $productdescription = $request->input("productdescription");
        $productprice = $request->input("productprice");
        $stockquantity = $request->input("stockquantity");
        $discountamount = $request->input("discountamount");
        $category = $request->input("category");
        $manufacturer = $request->input("manufacturer");
        
        $uploadedFile = $request->file("productimage");
        $imagePath = $uploadedFile->store('images', 'public');
        $data = array(
            "productname" => $productname,
            "productdescription" => $productdescription,
            "productprice" => $productprice,
            "stockquantity" => $stockquantity,
            "discountamount" => $discountamount,
            "category" => $category,
            "manufacturer" => $manufacturer,
            "productimage" => $imagePath
        );
        DB::table("product")->insert($data);
        return redirect()->route('dashboard');
    }

    public function visitProduct($id){
        $userId = session()->get('userId');
        if(!$userId){
            return redirect()->route('login');
        }
        $product = DB::table("product")->where("id", $id)->first();
        return view("productoverview", ["product" => $product]);
    }

    public function manageProducts(){
        $adminId = session()->get('adminId');
        if(!$adminId){
            return redirect()->route('adminlogin');
        }
        $products = DB::table("product")->get();
        return view("manageproduct", ["products" => $products]);
    }

    public function editProduct($id){
        $adminId = session()->get('adminId');
        if(!$adminId){
            return redirect()->route('adminlogin');
        }
        $product = DB::table("product")->where("id", $id)->first();
        return view("editproduct", ["product" => $product]);
    }

    public function updateProduct(Request $request, $id){
        $product = DB::table('product')->where('id', $id)->first();

        $productname = $request->input("productname");
        $productdescription = $request->input("productdescription");
        $productprice = $request->input("productprice");
        $stockquantity = $request->input("stockquantity");
        $discountamount = $request->input("discountamount");
        $category = $request->input("category");
        $manufacturer = $request->input("manufacturer");

        $uploadedFile = $request->file("productimage");
        if($uploadedFile){
            $imagePath = $uploadedFile->store('images', 'public');
        }else{
            $imagePath = $product->productimage;
        }
        $data = array(
            "productname" => $productname,
            "productdescription" => $productdescription,
            "productprice" => $productprice,
            "stockquantity" => $stockquantity,
            "discountamount" => $discountamount,
            "category" => $category,
            "manufacturer" => $manufacturer,
            "productimage" => $imagePath
        );
        DB::table('product')->where('id', $id)->update($data);
        return redirect()->route('manageproduct');
    }

    public function deleteProduct($id){
        DB::table('product')->where('id', $id)->delete();
        return redirect()->route('manageproduct');
    }
}
