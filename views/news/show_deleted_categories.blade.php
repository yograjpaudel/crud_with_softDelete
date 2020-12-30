@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
                <div class="card-header">
                    <h1>Deleted Categories</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Rank</th>
                                <th>Slug</th>
                                <th>Status</th>
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
                            @forelse ($collections as $category)
                            <tr>
                                <td scope="row">{{ $category->name }}</td>
                                <td>{{ $category->rank }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>{{ $category->status }}</td>
                                <td>{{ $category->deleted_at }}</td>
                                <td>{{ $user->find($category->deleted_by)->name ?? $category->deleted_by }}</td>
                                <td>{{ $category->created_at }}</td>
                                <td>{{ $category->updated_at }}</td>
                                <td>{{ $user->find($category->created_by)->name }}</td>
                                <td>{{ $user->find($category->updated_by)->name ?? $category->updated_by}}</td>
                                <td><a href="/news/category/{{$category->id}}/restore">Restore</a></td>
                                <td><a href="/news/category/{{$category->id}}/p_delete">Delete Permanently</a></td>
                            </tr> 
                            @empty
                            <tr>
                                <td class="alert-danger" role="alert" colspan="11">No Data Found</td>
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
