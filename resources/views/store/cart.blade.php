@extends('store.master')

@section('content')

<section id="cart_items">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive cart_info">
                <table class="table table_condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description">Description</td>
                        <td class="price">Price</td>
                        <td class="price">Qtd</td>
                        <td class="price">Total</td>
                        <td></td>
                    </thead>

                    <tbody>
                    @forelse($cart->all() as $k=>$item)
                        <tr>
                            <td class="cart_product">
                                <a href="#">
                                    Image
                                </a>
                            </td>
                            <td class="cart_description">
                                <a href="{{route('store.products.show',$k)}}">{{$item['name']}}</a><br>
                                Código: {{$k}}
                            </td>
                            <td class="cart_description">
                                R$: {{$item['price']}}
                            </td>
                            <td class="cart_quantity">
                                @if($item['qtd'] >= 2)
                                    <a href="{{route('store.cart.menos',$k)}}" class="btn"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
                                @endif
                                {{$item['qtd']}} <a href="{{route('store.cart.mais',$k)}}" class="btn"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                            </td>

                            <td class="cart_total">
                                <p> {{$item['price'] * $item['qtd']}}</p>
                            </td>
                            <td class="cart_delete">
                                <a href="{{route('store.cart.delete',$k)}}">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <p class="bg-danger">
                            <h3>Não existe itens no carrinho!</h3>
                        </p>
                    @endforelse
                    <tr class="cart_menu">
                        <td colspan="6">
                            <div class="pull-right">
                                <span>
                                    TOTAL: R$ {{$cart->getTotal()}}
                                </span>
                                <a href="#" class="btn btn-success">
                                    Fechar a conta
                                </a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</section>

@endsection
