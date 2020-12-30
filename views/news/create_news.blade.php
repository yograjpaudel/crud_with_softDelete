@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Create News</h1>

                    <form action="{{ route('news.news.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="title">Title</label><br>
                        <input type="text" name="title" id="title"><br>

                        <label for="category_id">Select Category</label><br>
                        <select name="category_id" id="category_id">
                            <option>-----S--e--l--e--c--t------</option>
                            @foreach ($collections as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select><br>
                        
                        <label for="short_description">Short Description</label><br>
                        <input type="text" name="short_description" id="short_description"><br>
                        
                        <label for="description">Description</label><br>
                        <textarea name="description" id="description" cols="70" rows="3"></textarea><br>
                        
                        <label for="image">Image</label><br>
                        <input type="file" name="image" id="image"><br>
                        

                        <br>
                        <button type="submit" class="btn btn-primary solid">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
