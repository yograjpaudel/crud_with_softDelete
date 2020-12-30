@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <ul>
                        <li><a href="{{ route('news.category.show') }}">View Categories</a></li>
                        <li><a href="{{ route('news.news.show') }}">View News</a></li>
                        <li><a href="{{ route('news.category.create') }}">Create Category</a></li>
                        <li><a href="{{ route('news.news.create') }}">Create News</a></li>
                        <li><a href="{{ route('news.deleted_categories.show') }}">View Deleted Categories</a></li>
                        <li><a href="{{ route('news.deleted_news.show') }}">View Deleted News</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
