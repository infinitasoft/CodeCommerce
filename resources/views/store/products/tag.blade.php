@extends('store.master')

@section('content')

    <div class="features_items"><!--items-->
        <h2 class="title text-center">Products by Tag: {{$tag->name}}</h2>

        @include('store.partial.product', ['products'=> $tag->products])


    </div><!--fitems-->

@endsection

@section('categories')

    @include('store.partial.categories')

@endsection