<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    //

     public function SubCategoryView(){
         $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::latest()->get();
        return view('backend.category.subcategory_view',compact('subcategory','categories'));
    }

     public function SubCategoryStore(Request $request){
        $request->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_hin' => 'required',
            
        ]);

        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_hin' => $request->subcategory_name_hin,
            'subcategory_slug_en' => strtolower(str_replace(' ','-',$request->subcategory_name_en)),
            'subcategory_slug_hin' => strtolower(str_replace(' ','-',$request->subcategory_name_hin)),
            
        ]);
         $notification = array(
            'message' => 'SubCategory Inserted Successfully',
            'alert-type' => 'success'
                );
        return redirect()->back()->with($notification);
    }

      public function SubCategoryEdit($id){
           $categories = Category::orderBy('category_name_en','ASC')->get();

        // $Categorys = Category::find($id);
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.category.subcategory_edit',compact('subcategory','categories'));

    }

    public function SubCategoryUpdate(Request $request){

        $subcategory_id = $request->id;
          SubCategory::FindOrFail($subcategory_id)->update([
                         'category_id' => $request->category_id,
                        'subcategory_name_hin' => $request->subcategory_name_hin,
                        'subcategory_slug_en' => strtolower(str_replace(' ','-',$request->subcategory_name_en)),
                        'subcategory_slug_hin' => strtolower(str_replace(' ','-',$request->subcategory_name_hin)),
                        
                        
                    ]);
                    $notification = array(
                        'message' => 'SubCategory Updated Successfully',
                        'alert-type' => 'success'
                            );
                    return redirect()->route('all.subcategory')->with($notification);

        

    }

                public function SubCategoryDelete($id){

                SubCategory::FindOrFail($id)->delete();

                    $notification = array(
                                    'message' => 'subCategory Delete Successfully',
                                    'alert-type' => 'success'
                                        );
                                return redirect()->back()->with($notification);
                }
}
