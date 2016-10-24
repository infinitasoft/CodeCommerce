@extends('admin.master')

@section('content')
    <h1>Create new product</h1>

    @if($errors->all())
    <div class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $message)
            <p>{{$message}}</p>
        @endforeach
    </div>
    @endif

    {!! Form::open(['route'=>['admin.products.update',$product->id],'method'=>'put']) !!}

    <div class="form-group">
        {!! Form::label('name','Name:') !!}
        {!! Form::text('name',$product->name,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-3">
                {!! Form::label('category_id','Category:') !!}
                {!! Form::select('category_id', $categories,$product->category_id ,['class'=>'form-control']) !!}
            </div>
            <div class="col-md-3">
                {!! Form::label('price','Price:') !!}
                {!! Form::text('price', $product->price,['class'=>'form-control']) !!}
            </div>
            <div class="col-md-3">
                {!! Form::label('featured','Featured:') !!}
                {!! Form::select('featured', ['0'=>'No', '1'=>'Yes'],$product->featured,['class'=>'form-control']) !!}
            </div>
            <div class="col-md-3">
                {!! Form::label('recommend','Recommend:') !!}
                {!! Form::select('recommend', ['0'=>'No', '1'=>'Yes'],$product->recommend,['class'=>'form-control']) !!}
            </div>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('description','Description:') !!}
        {!! Form::textarea('description',$product->description,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('tags','Tags:') !!}
        {!! Form::textarea('tags',$product->taglist,['class'=>'form-control','placeholder'=>'Separe as tags por vírgula.']) !!}
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