<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $data = file_get_contents('products.json');
        $productdata = json_decode($data, true);
        return view('welcome',[
            'productdata' =>$productdata
        ]);
    }

    public function add(Request $request){
        $request -> validate([
            'type' => 'required',
            'title' =>'required',
            'fname' => 'required',
            'sname' => 'required',
            'price' =>'required',
            'pages' =>'required',
        ]);

        $type = $request->input('type');
        $title = $request->input('title');
        $fname = $request->input('fname');
        $sname = $request->input('sname');
        $price = $request->input('price');
        $pages = $request->input('pages');

        $string = file_get_contents('products.json');

        $productsJson = json_decode($string, true);

        $ids = [];
        foreach ($productsJson as $product ){
            $ids[] = $product['id'];
        }
        rsort($ids);
        $newId = $ids[0] + 1;

        $products = [];
        foreach ($productsJson as $product) {
            $products[] = $product; 
        }

        $newProduct = [];
        $newProduct['id'] = $newId;
        $newProduct['type'] = $type;
        $newProduct['title'] = $title;
        $newProduct['firstname'] = $fname;
        $newProduct['mainname'] = $sname;
        $newProduct['price'] = $price;

        if($type=='cd') $newProduct['playlength'] = $pages;
        if($type=='book') $newProduct['numpages'] = $pages;

        $products[] = $newProduct;

        $json = json_encode($products);
        if(file_put_contents('products.json',$json))
            return back()->with('success',"Product Added Successfully");
        else
            return back()->with('fail',"Product Listing failed");
    }

    public function edit($id){
        $string = file_get_contents('products.json');

        $productsJson = json_decode($string, true);

        $products = [];
        foreach ($productsJson as $product){
            if($product['id']==$id){
                $products[] = $product;
                break;
            }
        }
        return view('product',[
            'products'=>$products
        ]);
    }

    public function update(Request $request,$id){
        $type = $request->input('type');
        $title = $request->input('title');
        $fname = $request->input('fname');
        $sname = $request->input('sname');
        $price = $request->input('price');
        $pages = $request->input('pages');

        $string = file_get_contents('products.json');
        $products = [];
        $productsJson = json_decode($string, true);

        foreach ($productsJson as $product){
           if($product['id']==$id){
               $product['title'] = $title;
               $product['firstname'] = $fname;
               $product['mainname'] = $sname;
               $product['price'] = $price;
               if($product['type']=='cd') $product['playlength'] =$pages;
               if($product['type']=='book') $product['numpages'] =$pages;
           }
           $products[] = $product;
        }
        $json = json_encode($products);
        if(file_put_contents('products.json',$json))
            return back()->with('success',"Product Updated Successfully");
        else
            return back()->with('fail',"Product Updating failed");

    }

    public function destroy($id){
        $string = file_get_contents('products.json');

        $productsJson = json_decode($string,true);

        $products = [];
        foreach($productsJson as $product){
            if($product['id'] != $id){
                $products[] = $product;
            }
        }
        $json = json_encode($products);
        if(file_put_contents('products.json',$json))
            return back()->with('success',"Product Deleted Successfully");
        else
            return back()->with('fail',"Product Deletion failed");

    }
}
