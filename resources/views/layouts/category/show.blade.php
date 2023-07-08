@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit category
                    <a href="{{url('/dashboard')}}">Back</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form autocomplete="off" method="POST" action="{{route('category.update',[$editCategory->id])}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" value="{{$editCategory->title}}"/>
                            <button type="submit" name="editCategory" class="btn btn-primary mt-2">Update</button>
                        </div
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
