@extends('layouts.app')

@section('content')
<div class="container">
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            <p> {{ Session::get('success') }} </p>
        </div>
    @endif
    <div class="row justify-content-center">     
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">List category
                    <a href="{{url('/dashboard')}}">Back</a>
                </div>                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>                            
                            <th scope="col">Handle</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php $stt=1; @endphp
                            @foreach ($category as $item)                               
                            <tr>
                                <th scope="row">{{$stt}}</th>
                                <td>{{$item->title}}</td>
                                <td class="d-flex">
                                    <form action="{{route('category.destroy',[$item->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input class="btn btn-danger btn-sm mx-2" type="submit" value="Delete">
                                    </form>
                                    <a class="btn btn-success btn-sm" href="{{route('category.show',[$item->id])}}">Edit</a>
                                    {{-- <form action="{{route('category.edit',[$item->id])}}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <input class="btn btn-primary btn-sm" type="submit" value="Edit">
                                    </form> --}}
                                </td>                            
                            </tr>
                            @php $stt++; @endphp
                          @endforeach                          
                        </tbody>
                    </table>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
