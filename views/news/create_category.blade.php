@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Create Category</h1>

                    <form action="{{route('news.category.store')}}" method="post">
                        @csrf
                        <label for="name">Name</label><br>
                        <input type="text" name="name" id="name"><br><br>
                        
                        <label for="rank">Rank</label><br>
                        <input type="number" name="rank" id="rank"><br><br>
                        
                        <label for="status">Status</label>
                        <input type="radio" name="status" id="status" value="1" class="m-2 pl-1">On
                        <input type="radio" name="status" id="status" value="0" checked class="m-2 pl-1">Off

                        <br>
                        <button type="submit" class="btn btn-primary solid">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
