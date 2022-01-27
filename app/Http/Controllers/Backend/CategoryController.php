<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    //
    public function CategoryView(){
        $category = Category::latest()->get();
        return view('backend.category.category_view',compact('category'));
    }

     public function CategoryStore(Request $request){
        $request->validate([
            'category_name_en' => 'required',
            'category_name_hin' => 'required',
            'category_icon' => 'required',
        ]);

        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_hin' => $request->category_name_hin,
            'category_slug_en' => strtolower(str_replace(' ','-',$request->category_name_en)),
            'category_slug_hin' => strtolower(str_replace(' ','-',$request->category_name_hin)),
            'category_icon' => $request->category_icon,
        ]);
         $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
                );
        return redirect()->back()->with($notification);
    }

      public function CategoryEdit($id){

        // $Categorys = Category::find($id);
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit',compact('category'));

    }

    public function CategoryUpdate(Request $request){

        $category_id = $request->id;
          Category::FindOrFail($category_id)->update([
                        'category_name_en' => $request->category_name_en,
                        'category_name_hin' => $request->category_name_hin,
                        'category_slug_en' => strtolower(str_replace(' ','-',$request->category_name_en)),
                        'category_slug_hin' => strtolower(str_replace(' ','-',$request->category_name_hin)),
                        'category_icon' => $request->category_icon,
                        
                    ]);
                    $notification = array(
                        'message' => 'Category Updated Successfully',
                        'alert-type' => 'success'
                            );
                    return redirect()->route('all.category')->with($notification);

        

    }

                public function CategoryDelete($id){

                Category::FindOrFail($id)->delete();

                    $notification = array(
                                    'message' => 'Category Delete Successfully',
                                    'alert-type' => 'info'
                                        );
                                return redirect()->back()->with($notification);
                }
}
