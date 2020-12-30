<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use App\User;
use App\Category;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index(User $user, Category $category)
    {
        $collections = News::all();

        return view('news.show_news', compact('collections', 'user', 'category'));
    }
    
    public function create(Category $categories)
    {
        $collections = $categories->all();

        return view('news.create_news', compact('collections'));
    }
    public function store(Request $request)
    {
        // dd($request->all());

        $data = $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'short_description' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image',
        ]);


        $slug = Str::slug($data['title'], '-');

        // Handling image
        if (request('image')){
            $imageLocation = $data['image']->store('uploads', 'public');
            $imageArray = ['image' => $imageLocation];
        }

        News::create(array_merge(
            $data,
            [
                'slug' => $slug,
                'created_by' => auth()->user()->id,
                
            ],
            $imageArray ?? [],

        ));

        return redirect(route('news.news.show'));
        
    }
    public function edit(News $news, Category $categories)
    {
        $cat = $categories->find($news->category_id);
        $collections = $categories->all();

        return view('news.edit_news', compact('news', 'cat', 'collections'));
    }

    public function update(Request $request, News $news)
    {
        $data = $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'short_description' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image',
        ]);


        $slug = Str::slug($data['title'], '-');

        if (request('image')){
            $imageLocation = $data['image']->store('uploads', 'public');
            $imageArray = ['image' => $imageLocation];
        }


        $news->update(array_merge(
            $data,
            [
                'slug' => $slug,
                'created_by' => $news->created_by,
                'updated_by' => auth()->user()->id,
            ],
            $imageArray ?? [],
        ));
        

        return redirect(route('news.news.show'));
        
    }

    public function destroy(News $news)
    {
        $news->delete(
            $news->update(['deleted_by'=> auth()->user()->id])
        );

        return redirect(route('news.deleted_news.show'));
    }

    public function deleted_news(User $user, Category $category)
    {
        $collections = News::onlyTrashed()->get();

        return view('news.show_deleted_news', compact('collections', 'user', 'category'));
    }

    public function restore($id)
    {
        $news = News::where('id', $id)->withTrashed()->first();
        $news->restore();

        return redirect(route('news.news.show'));
    }

    public function p_delete($id)
    {
        $news = News::where('id', $id)->forceDelete();
        
        return back();
    }
}
