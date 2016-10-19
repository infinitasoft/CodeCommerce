@extends('admin.master')

@section('content')
    <h1>Edit: {{$category->name}}</h1>

    {!! Form::open(['route'=>['admin.categories.update',$category->id],'method'=>'put']) !!}

    <div class="form-group">
        {!! Form::label('name','Name:') !!}
        {!! Form::text('name',$category->name,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description','Description:') !!}
        {!! Form::textarea('description',$category->description,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <a href="{{route('admin.categories.index')}}" class="btn">Back</a>
            </div>
            <div class="col-md-6">
                {!! Form::submit('Save',['class'=>'btn btn-primary pull-right']) !!}
            </div>
        </div>

    </div>

    {!! Form::close() !!}
@endsection