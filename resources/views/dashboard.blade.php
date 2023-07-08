@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <a href="{{route('category.index')}}" class="btn btn-success w-100 mb-2">List category</a>
                        <a href="{{route('category.create')}}" class="btn btn-primary w-100 mb-2">Add category</a> 
                        <a href="{{route('post.create')}}" class="btn btn-info w-100 mb-2">Add post</a>
                        <a href="{{route('post.index')}}" class="btn btn-warning w-100">List post</a>
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
