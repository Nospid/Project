<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('brand.index',compact('brands'));
    }
       
     public function create()
     {
        $categories =Category::all();
      return view('brand.create',compact('categories'));
     }
     

     public function store(Request $request){
    
    $data = $request->validate([
        'name' => 'required|string|unique:brands',
        'priority' => 'required|numeric',
        'category_id' => 'required',
    ]);

      Brand::create($data);
      return redirect()->route('brand.index')->with('sucess','Brand Created Sucessfully');
     }



     public function edit($id)
     {
         // dd($id);
         $categories =Category::all();
         $brands=Brand::find($id);
           return view('brand.edit',compact('brands','categories'));
     }
 
     /**
      * Update the specified resource in storage.
      */
     public function update(Request $request,$id)
     {
         $brands=Brand::find($id);
 
             $data=  $request->validate([
             'name'=>'required',
             'priority'=>'required|numeric',
             'category_id' => 'required',
 
         ]);
 
         $brands->update($data);
         return redirect(route('brand.index'))->with('update',"Brand Updated Sucessfully");
        
     }
 
     /**
      * Remove the specified resource from storage.
      */
     public function destroy(Request $request)
     {
         $brand = Brand::find($request->dataid);
         if(Product::where('brand_id',$brand->id)->count()>0)
         {
             return back()->with('success','Cannot Delete this Brand.Related products exist.');
         }
         $brand->delete();
         return redirect(route('brand.index'))->with('success','Brand deleted successfully!');
     }
}
