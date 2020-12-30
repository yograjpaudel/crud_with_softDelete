@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
                <div class="card-header">
                    <h1>News</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Slug</th>
                                <th>Short Description</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Deleted_At</th>
                                <th>Deleted_By</th>
                                <th>Created_At</th>
                                <th>Updated_At</th>
                                <th>Created_By</th>
                                <th>Updated_By</th>
                                <th colspan="2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($collections as $news)
                            <tr>
                                <td scope="row">{{ $news->title }}</td>
                                <td>{{ $category->find($news->category_id)->name ?? '' }}</td>
                                <td>{{ $news->slug }}</td>
                                <td>{{ $news->short_description }}</td>
                                <td>{{ $news->description }}</td>
                                <td><img class="w-100" src="/storage/{{ $news->image }}" alt="Not Available"></td>
                                <td>{{ $news->deleted_at }}</td>
                                <td>{{ $user->find($news->deleted_by)->name ?? $news->deleted_by }}</td>
                                <td>{{ $news->created_at }}</td>
                                <td>{{ $news->updated_at }}</td>
                                <td>{{ $user->find($news->created_by)->name }}</td>
                                <td>{{ $user->find($news->updated_by)->name ?? $news->updated_by}}</td>
                                <td><a href="/news/news/{{$news->id}}/edit">Edit</a></td>
                                <td><a href="/news/news/{{$news->id}}">Delete</a></td>
                            </tr> 
                            @empty
                            <tr>
                                <td class="alert-danger" role="alert" colspan="13">No Data Found</td>
                            </tr>
                            @endforelse
                            
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
