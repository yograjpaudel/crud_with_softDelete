@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Edit News</h1>

                    <form action="/news/news/{{$news->id}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        
                        <label for="title">Title</label><br>
                        <input type="text" name="title" id="title" value="{{ $news->title }}"><br>

                        <label for="category_id">Select Category</label><br>
                        <select name="category_id" id="category_id">
                            <option value="{{ $cat->id }}"> {{ $cat->name }} </option>
                            @foreach ($collections as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select><br>
                        
                        <label for="short_description">Short Description</label><br>
                        <input type="text" name="short_description" id="short_description" value="{{ $news->short_description }}"><br>
                        
                        <label for="description">Description</label><br>
                        <textarea name="description" id="description" cols="70" rows="3"> {{ $news->description }} </textarea><br>
                        
                        <label for="image">Image</label><br>
                        <input type="file" name="image" id="image"><br>
                        

                        <br>
                        <button type="submit" class="btn btn-primary solid">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
