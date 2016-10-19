@extends('admin.master')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <h4>Categories</h4>
        </div>
        <div class="col-md-6">
            <a href="{{route('admin.categories.create')}}" class="btn btn-primary pull-right">
                Create new category
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
                @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{$category->id}}</th>
                        <td><a href="{{route('admin.categories.edit',$category->id)}}">{{$category->name}}</a> <br> <span class="badge">Products: {{$category->products->count()}}</span></td>
                        <td><a href="{{route('admin.categories.delete',$category->id)}}" class="btn btn-danger">
                                <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                            </a>
                        </td>
                        </tr>
                @endforeach
            </tbody>
        </table>
    {!! $categories->render() !!}
@endsection