@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Edit Category</h1>

                    <form action="/news/category/{{$category->id}}" method="post">
                        @csrf
                        @method('patch')

                        <label for="name">Name</label><br>
                        <input type="text" name="name" id="name" value="{{ $category->name }}"><br><br>
                        
                        <label for="rank">Rank</label><br>
                        <input type="number" name="rank" id="rank" value="{{ $category->rank }}"><br><br>
                        
                        <label for="status">Status</label>
                        @if ($category->status)
                            <input type="radio" name="status" id="status" value="1" checked class="m-2 pl-1">On
                            <input type="radio" name="status" id="status" value="0" class="m-2 pl-1">Off
                        @else
                        <input type="radio" name="status" id="status" value="1" class="m-2 pl-1">On
                        <input type="radio" name="status" id="status" value="0" checked class="m-2 pl-1">Off
                        @endif
                        

                        <br>
                        <button type="submit" class="btn btn-primary solid">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
