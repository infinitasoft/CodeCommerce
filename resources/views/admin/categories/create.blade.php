@extends('admin.master')

@section('content')
    <h1>Create new category</h1>

    @if($errors->all())
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $message)
                <p>{{$message}}</p>
            @endforeach
        </div>
    @endif

    {!! Form::open(['route'=>'admin.categories.store','method'=>'post']) !!}

    <div class="form-group">
        {!! Form::label('name','Name:') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description','Description:') !!}
        {!! Form::textarea('description',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <a href="{{route('admin.categories.index')}}" class="btn">Back</a>
            </div>
            <div class="col-md-6">
                {!! Form::submit('Create',['class'=>'btn btn-primary pull-right']) !!}
            </div>
        </div>

    </div>

    {!! Form::close() !!}
@endsection