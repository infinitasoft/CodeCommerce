@foreach($products as $product)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">


                    @if(count($product->images))
                        <img src="{{asset('assets/uploads/'.$product->first_image['name'])}}" alt="{{$product->name}}" />
                    @else
                        <img src="{{asset('loja/images/no-img.jpg')}}" alt="{{$product->name}}" />
                    @endif

                    <h2>R$ {{number_format($product->price,2,',','.')}}</h2>
                    <p>{{$product->name}}</p>
                    <a href="{{route('store.products.show',$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                </div>
                <div class="product-overlay">
                    <div class="overlay-content">
                        <h2>R$ R$ {{number_format($product->price,2,',','.')}}</h2>
                        <p>{{$product->name}}</p>
                        <a href="{{route('store.products.show',$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                        <a href="{{ route('store.cart.add', ['id'=>$product->id]) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach