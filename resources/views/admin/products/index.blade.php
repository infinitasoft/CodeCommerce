@extends('admin.master')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <h4>Products</h4>
        </div>
        <div class="col-md-6">
            <a href="{{route('admin.products.create')}}" class="btn btn-primary pull-right">
                Create new product
            </a>
        </div>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td><a href="{{route('admin.products.edit',$product->id)}}">{{$product->name}}</a> <br> <span class="badge">Category: {{$product->category['name']}}</span> <span class="badge"> Images {{$product->images->count()}} </span> <span class="badge"> Tags {{$product->tags->count()}}</span></td>
                    <td>
                        <a href="{{route('admin.products.delete',$product->id)}}" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                        </a>
                        <a href="#" class="btn btn-warning">
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $products->render() !!}
@endsection