<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function addProduct(Request $request)
    {

        $product = Product::create([
            'address'=>$request->address,
            'description'=>$request->description,
            'software_used'=>$request->software_used,
            'printing_technology'=>$request->printing_technology,
            'color'=>$request->color,
            'size'=>$request->size,
            'user_id'=>Auth::user()->id,
        ]);
        foreach ($request->images as $key => $img) {
            $myfile =  $img->getClientOriginalName();
            $img->move(public_path('upload/'), $myfile);
            $path ='upload/'.$myfile;
            $gallery = Gallery::create([
                'product_id'=>$product->id,
                'model'=>'App/Model/Product',
                'image_src'=>$path,
                
            ]);
        }
        return redirect()->back();
    }
    public function listProduct()
    {
        $products=Product::with('gallery')->get();
        return view('pages.admin.dashboard.products.index', compact('products'));
    }
    public function productApproval(Request $request,$id)
    {  
        // dd($request->status);
        // $status = Product::find($id)->pluck('status')->first();
        $status = (int)$request->status;
  
        if($status==1){
            Product::find($id)->update([
                'status' => $status,
            ]);
        
            return 1;
        }else{
            Product::find($id)->update([
                'status' => $status,
            ]);
        
            return 0;
        }
    }
    public function productDelete($id)
    {
        Product::find($id)->delete();
        Gallery::where('product_id',$id)->delete();
        return redirect()->back();
    }
}
