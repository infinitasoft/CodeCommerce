@extends('admin.master')

@section('content')
    <h1>Create new image</h1>

    @if($errors->all())
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $message)
                <p>{{$message}}</p>
            @endforeach
        </div>
    @endif

    {!! Form::open(['route'=>'admin.images.store','method'=>'post','files'=>'true']) !!}



    <div class="form-group">
        {!! Form::label('image','Image:') !!}
        {!! Form::file('image') !!}
    </div>

    <div class="form-group">
        {!! Form::label('product_id','Product:') !!}
        {!! Form::select('product_id', $products, null ,['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <a href="{{route('admin.products.index')}}" class="btn">Back</a>
            </div>
            <div class="col-md-6">
                {!! Form::submit('Create',['class'=>'btn btn-primary pull-right']) !!}
            </div>
        </div>

    </div>

    {!! Form::close() !!}
@endsection