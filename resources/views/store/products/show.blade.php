@extends('store.master')
@section('content')
    <div class="col-sm-9 padding-right">
        <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
                <div class="view-product">
                    @if(count($product->images))
                        <img src="{{asset('assets/uploads/'.$product->first_image['name'])}}" alt="{{$product->name}}" />
                    @else
                        <img src="{{asset('loja/images/no-img.jpg')}}" alt="{{$product->name}}" />
                    @endif

                </div>
                <div id="similar-product" class="carousel slide" data-ride="carousel">

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            @foreach($product->images as $image)
                                <a href="#"><img src="{{asset('assets/uploads/'.$image->name)}}" alt="" width="80"></a>
                            @endforeach
                        </div>

                    </div>

                </div>

            </div>
            <div class="col-sm-7">
                <div class="product-information"><!--/product-information-->

                    <h2>{{$product->category->name}}: {{$product->name}}</h2>

                    {{$product->description}}
                    <span>
                                    <span>R$ {{number_format($product->price,2,',','.')}}</span>
                                        <a href="http://commerce.dev:10088/cart/2/add" class="btn btn-fefault cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Adicionar no Carrinho
                                        </a>
                                </span>
                    <hr>
                    <div class="tags">
                        <h4>Tags:</h4>
                        @foreach($product->tags as $tag)
                            <a href="{{route('store.products.tag.show',$tag->id)}}"><kbd>{{$tag->name}}</kbd></a>
                        @endforeach
                    </div>
                </div>
                <!--/product-information-->
            </div>
        </div>
        <!--/product-details-->
    </div>
@endsection

@section('categories')

    @include('store.partial.categories')

@endsection