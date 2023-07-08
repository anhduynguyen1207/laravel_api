@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Post
                    <a href="{{url('/dashboard')}}">Back</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form autocomplete="off" method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">                           
                            <label for="title">Title</label>
                            <input type="text" placeholder="title" class="form-control" name="title">

                            <label for="imge">Image</label>
                            <input type="file" class="form-control" name="image">

                            <label for="title">Short Desc</label>
                            <textarea id="ckeditor_shor_desc" type="text" placeholder="description" class="form-control" rows=5 resize=none name="short_desc"></textarea>

                            <label for="title">Content</label>
                            <textarea id="ckeditor_content" type="text" placeholder="description" class="form-control" rows=8 resize=none name="post_content"></textarea>

                            <label for="title">Category</label>
                            <select name="post_category_id" class="form-control">                                
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                               
                            </select>
                            <button type="submit" name="addCategory" class="btn btn-primary mt-2">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
