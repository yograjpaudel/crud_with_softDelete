<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    public function index(User $user)
    {
        $collections = Category::all();

        return view('news.show_category', compact('collections', 'user'));
    }

    public function create()
    {
        return view('news.create_category');
    }
    public function store(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required',
            'rank' => 'required',
            'status' => 'required',
        ]);

        $slug = Str::slug($data['name'], '-');

        $category->create(array_merge(
            $data,
            [
                'slug' => $slug,
                'created_by' => auth()->user()->id,
            ]
        ));

        return redirect(route('news.category.show'));

    }

    public function edit(Category $category)
    {

        return view('news.edit_category', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required',
            'rank' => 'required',
            'status' => 'required',
        ]);

        $slug = Str::slug($data['name'], '-');

        $category->update(array_merge(
            $data,
            [
                'slug' => $slug,
                'created_by' => $category->created_by,
                'updated_by' => auth()->user()->id,
            ]
        ));

        return redirect(route('news.category.show'));
        
    }

    public function destroy(Category $category)
    {
        $category->delete(
            $category->update(['deleted_by'=> auth()->user()->id])
        );

        return redirect(route('news.deleted_categories.show'));
    }

    public function deleted_categories(User $user)
    {
        $collections = Category::onlyTrashed()->get();

        return view('news.show_deleted_categories', compact('collections', 'user'));
        
    }

    public function restore($id)
    {
        $category = Category::where('id', $id)->withTrashed()->first();
        $category->restore();

        return redirect(route('news.category.show'));
    }

    public function p_delete($id)
    {
        $category = Category::where('id', $id)->forceDelete();

        return back();
    }

}
