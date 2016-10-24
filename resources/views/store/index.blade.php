@extends('store.master')

@section('content')

    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Em destaque</h2>

        @include('store.partial.product', ['products'=> $featureds])


    </div><!--features_items-->



    <div class="features_items"><!--recommended-->
        <h2 class="title text-center">Recomendados</h2>

        @include('store.partial.product', ['products'=> $recommends])


    </div><!--recommended-->

@endsection

@section('categories')

    @include('store.partial.categories')

@endsection