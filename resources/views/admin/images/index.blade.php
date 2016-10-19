@extends('admin.master')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <h4>Images</h4>
        </div>
        <div class="col-md-6">
            <a href="{{route('admin.images.create')}}" class="btn btn-primary pull-right">
                Create new image
            </a>
        </div>
    </div>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($images as $image)
                    <tr>
                        <th scope="row">{{$image->id}}</th>
                        <td>{{$image->product['name']}}</td>
                        <td><img src="{{asset('assets/uploads/'.$image->name)}}" width="150px" height="150px" alt="{{$image->product['name']}}"></td>
                        <td><a href="{{route('admin.images.delete',$image->id)}}" class="btn btn-danger">
                                <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                            </a>
                        </td>
                        </tr>
                @endforeach
            </tbody>
        </table>
    {!! $images->render() !!}
@endsection