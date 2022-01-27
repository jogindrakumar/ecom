<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    //

     public function SubCategoryView(){
        $subcategory = SubCategory::latest()->get();
        return view('backend.category.subcategory_view',compact('subcategory'));
    }

     public function SubCategoryStore(Request $request){
        $request->validate([
            'subcategory_name_en' => 'required',
            'subcategory_name_hin' => 'required',
            'subcategory_icon' => 'required',
        ]);

        SubCategory::insert([
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_hin' => $request->subcategory_name_hin,
            'subcategory_slug_en' => strtolower(str_replace(' ','-',$request->subcategory_name_en)),
            'subcategory_slug_hin' => strtolower(str_replace(' ','-',$request->subcategory_name_hin)),
            'subcategory_icon' => $request->subcategory_icon,
        ]);
         $notification = array(
            'message' => 'subCategory Inserted Successfully',
            'alert-type' => 'success'
                );
        return redirect()->back()->with($notification);
    }

      public function SubCategoryEdit($id){

        // $Categorys = Category::find($id);
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.category.subcategory_edit',compact('subcategory'));

    }

    public function SubCategoryUpdate(Request $request){

        $subcategory_id = $request->id;
          SubCategory::FindOrFail($subcategory_id)->update([
                        'subcategory_name_en' => $request->subcategory_name_en,
                        'subcategory_name_hin' => $request->subcategory_name_hin,
                        'subcategory_slug_en' => strtolower(str_replace(' ','-',$request->subcategory_name_en)),
                        'subcategory_slug_hin' => strtolower(str_replace(' ','-',$request->subcategory_name_hin)),
                        'subcategory_icon' => $request->subcategory_icon,
                        
                    ]);
                    $notification = array(
                        'message' => 'subCategory Updated Successfully',
                        'alert-type' => 'success'
                            );
                    return redirect()->route('all.subcategory')->with($notification);

        

    }

                public function SubCategoryDelete($id){

                SubCategory::FindOrFail($id)->delete();

                    $notification = array(
                                    'message' => 'subCategory Delete Successfully',
                                    'alert-type' => 'info'
                                        );
                                return redirect()->back()->with($notification);
                }
}
