<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Models\Account;
use App\Models\Category;
use Illuminate\Http\Response;

class CategoriesController extends Controller
{
    public function index()
    {
        return Category::all();
    }

//    public function store(CreateCategoryRequest $request)
//    {
//        return response()->json(
//          Category::create($request->all()),
//          Response::HTTP_CREATED
//        );
//    }

//    public function update(Category $category, UpdateCategoryRequest $request)
//    {
//        return tap($category)->update($request->all());
//    }
}