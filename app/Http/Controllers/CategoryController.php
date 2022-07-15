<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function __construct()
    {
        //check is user is log in or not
//     $user = auth()->user();
//
//        if (isset($user)) {
//            $this->middleware( $user->hasRole('admin') )->all();
//            $this->middleware($user->hasRole('user'))->only('show');
//        }
//
//        $this->middleware( empty($user))->only('edit');
//

    }

    public function index()
    {
        $categories =  Category::all();
        return view("allCategories", compact("categories", ));
    }
    public function show(Category $category,Request $request){
        $latestBooks = Book::whereCategoryId($request->id)->latest()->get();
        $categories = Category::all();
        return view('welcome', compact('latestBooks','categories'));

    }

    public function destroy(Category $category,Request $request)
    {
        $category = Category::find($request->id);

        if (isset($category)){
            $category->delete();
            return redirect()->route('categories.index');
        }else{
            abort(404);
        }
    }

    public function create()
    {
        return view("addCategory");
    }
    public function store(Request $request)
    {
        $category = new Category(
            [
                "name" => $request->slug,
                "slug" => $request->slug,
            ]
        );
        $category->save();
        return redirect()->route('categories.index');
    }




//    public function deleteCategory(Request $request)
//    {
//        $category = Category::find($request->id);
//
//        if (isset($category)){
//            $category->delete();
//            return redirect()->route('seeAllCategories');
//        }else{
//            abort(404);
//        }
//    }


//    // call it listBooksByCategory(Category $category)
//    public function category(Request $request)
//    {
//
//
////        $category = Category::find($request->id);
////        $latestBooks = $category->books;
//
//    }
//    public function showAllCategories()
//    {
//        $categories =  Category::all();
//        return view("allCategories", compact("categories", ));
//    }



//    public function addCategory()
//    {
//        return view("addCategory");
//    }
//
//    public function addCategoryPost(Request $request)
//    {
//        $category = new Category(
//            [
//                "slug" => $request->slug,
//            ]
//        );
//        $category->save();
//        return redirect()->route('seeAllCategories');
//    }


}
