@extends('front.frontbase')

@section('content')

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li class="active">Shopping Cart</li>
                </ol>
                @if (session()->has('success_message'))
                    <div class="alert alert-success">
                        {{ session()->get('success_message') }}
                    </div>
                @endif

                @if (session()->has('error_message'))
                    <div class="alert alert-danger">
                        {{ session()->get('error_message') }}
                    </div>
                @endif
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description"></td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse (Cart::content() as $item)
                        <tr>
                            <td class="cart_product">
                                <a><img src="{{ url('uploads/image/'.$item->model->image) }}" style="height: 85px; width: 80px;" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h5><a>{{ $item->name }}</a></h5>
                                <p></p>
                            </td>
                            <td class="cart_price">
                                <p>Rp. {{number_format ($item->price) }}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <a class="cart_quantity_up" href="{{ route('cart.addItem',$item->id) }}"> + </a>
                                    <input class="cart_quantity_input" type="text" name="quantity" readonly="" value="{{ $item->qty }}" autocomplete="off" size="2">
                                    <a class="cart_quantity_down" href="{{ route('cart.edit',$item->id) }}"> - </a>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">Rp. {{number_format ($item->subtotal) }}</p>
                            </td>
                            <td class="cart_delete">
                                <form action="{{ url('cart', [$item->rowId]) }}" method="POST" class="side-by-side">
                                {!! csrf_field() !!}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" class="btn btn-danger btn-sm" value="Remove">
                            </form>
                            </td>
                        </tr>
                        @empty
                            <td class="cart_description">
                                <h4><p>Keranjang masih kosong</p></h4>
                            </td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->
       
@endsection

@section('extra-js')
    <script>
        (function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.cart_quantity_input').on('change', function() {
                var id = $(this).attr('value')
                $.ajax({
                  type: "PATCH",
                  url: '{{ url("/cart") }}' + '/' + id,
                  data: {
                    'cart_quantity_input': this.value,
                  },
                  success: function(data) {
                    window.location.href = '{{ url('/cart') }}';
                  }
                });

            });

        })();

    </script>
@endsection
