@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Post
                    <a href="{{url('/dashboard')}}">Back</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form autocomplete="off" method="POST" action="{{route('post.update',[$editPost->id])}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" value="{{$editPost->title}}"/>

                            <label for="image">Image </label>
                            <img src="{{URL::asset('public/uploads/'.$editPost->image)}}" width="100" height="100" class="py-2">
                            <input type="file" class="form-control" name="image">

                            <label for="title">Short Desc</label>
                            <textarea id="ckeditor_shor_desc" type="text" class="form-control" rows=5 resize=none name="short_desc">{{$editPost->short_desc}}</textarea>

                            <label for="title">Content</label>
                            <textarea id="ckeditor_content" type="text" class="form-control" rows=8 resize=none name="post_content">{{$editPost->desc}}</textarea>

                            <label for="title">Category</label>
                            <select name="post_category_id" class="form-control">                                
                                @foreach ($categories as $category)
                                    <option {{$category->id == $editPost->post_category_id ? "selected" : "" }} value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                               
                            </select>
                            <button type="submit" name="editPost" class="btn btn-primary mt-2">Update</button>
                        </div
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
