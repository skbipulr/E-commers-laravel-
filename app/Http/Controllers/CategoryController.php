<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryForm;
use App\Category;
use Auth;
use Carbon\Carbon;

class CategoryController extends Controller
{
    function addCategory()
      {
        //  print_r(Category::onlyTrashed()->get()) ;
       return view('admin\category\index',[
           'categories' => Category::All(),
           'deleted_categories' => Category::onlyTrashed()->get()
       ]);
      }

     function addCategorypost(CategoryForm $request)
      {
         Category::insert([
             'category_name' => $request->category_name,
             'category_description' => $request->category_description,
             'user_id' => Auth::id(),
             'created_at' => Carbon::now(),
         ]);
         return back()->with('succss_status',$request->category_name.' category added successfully');
      }

      function deleteCategory($category_id)
          {
             Category::find($category_id)->delete();
             return back()->with('delete_status','Your category delete successfully!');
          }



      function editCategory($category_id)
          {
             return view('admin.category.edit',[
                 'category_info' => Category::find($category_id)
             ]);
          }

          //editCategorypost

      function editCategorypost(Request $request)
         {

         $request->validate([
             'category_name' => 'unique:categories,category_name,'.$request->category_id
         ]);

            Category::find($request->category_id)->update([
                'category_name' => $request->category_name,
                'category_description' => $request->category_description
            ]);

             //return back()->with('edit_status','Your category edited successfully!');
             return redirect('app/category')->with('edit_status','Your category edited successfully!');
        }

        function restoreCategory($category_id)
           {
              Category::withTrashed()->find($category_id)->restore();
             return back()->with('restore_status','Your category restored successfully!');
          }



          function forcedeleteCategory($category_id)
             {
                // echo $category_id;
                Category::withTrashed()->find($category_id)->forceDelete();
               return back()->with('forcedelete_status','Your category permanently deleted!');
            }
          function markDelete(Request $request){

                if (isset($request->category_id)) {
                    foreach ($request->category_id as $cat_id) {
                        Category::find($cat_id)->delete();
                    }
                }
                return back();

             }


}
