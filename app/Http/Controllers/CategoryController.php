<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    public function index(){
        $userId = Auth::user()->id;
        $categories = Category::where('userId',$userId)->get();
        return view('categories',['categories'=>$categories]);
    }

    public function store(Request $request){
        $newCategoryName = $request['newCategoryName'];
        $userId = Auth::user()->id;

        $newCategory = new Category;
        $newCategory->categoryName=$newCategoryName;
        $newCategory->userId=$userId;
        $newCategory->save();

        return redirect('categories');
    }
}
