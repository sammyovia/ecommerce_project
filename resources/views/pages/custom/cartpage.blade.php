<x-mylayouts.layout-custom>


    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="bread"><span><a href="index.html">Home</a></span> / <span>Shopping Cart</span></p>
                </div>
            </div>
        </div>
    </div>


    @if ($cart_data->isEmpty())
    <x-core..cart-empty />
    @else





    <div class="colorlib-product">
        <div class="container">






            <div class="row row-pb-lg">
                <div class="col-md-12">
                    <div class="product-name d-flex">
                        <div class="one-forth text-left px-4">
                            <span>Product Details</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>Price</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>Quantity</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>Total</span>
                        </div>
                        <div class="one-eight text-center px-4">
                            <span>Remove</span>
                        </div>
                    </div>



                    @foreach ($cart_data as $data)


                    <div class="product-cart d-flex">
                        <div class="one-forth">
                            <div class="product-img" style="background-image: url('{{ $data->getImage() }}');">
                            </div>
                            <div class="display-tc">
                                <h3>{{ $data->title }}</h3>
                            </div>
                        </div>
                        <div class="one-eight text-center">
                            <div class="display-tc">
                                <span class="price">${{ $data->price }}</span>
                            </div>
                        </div>
                        <div class="one-eight text-center">
                            <div class="display-tc">
                                <input type="text" id="quantity" name="quantity"
                                    class="form-control input-number text-center" value="{{ $data->pivot->quantity }}"
                                    min="1" max="100">
                            </div>
                        </div>
                        <div class="one-eight text-center">
                            <div class="display-tc">
                                <span class="price">${{ $data->getCartQuantityPrice() }}</span>
                            </div>
                        </div>
                        <div class="one-eight text-center">

                            <form action="{{ route('cart.destroy', ['id' => $data->pivot->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')


                                <div class="display-tc">
                                    <button class="btn btn-default btn-sm" type="submit"><span
                                            class="closed"></span></button>

                                    {{-- <a href="#" class="closed"></a> --}}
                                </div>


                            </form>


                            {{-- <div class="display-tc">
                                <a href="#" class="closed"></a>
                            </div> --}}
                        </div>
                    </div>

                    @endforeach




                </div>
            </div>


            <div class="container mb-3">
                <div class="text-center">
                    <a class="btn btn-primary" href="{{ route('checkout.index') }}">Proceed to checkout</a>
                </div>
            </div>


            <div class="row row-pb-lg">
                <div class="col-md-12">
                    <div class="total-wrap">
                        <div class="row">
                            <div class="col-sm-8">
                                <form action="#">
                                    <div class="row form-group">
                                        <div class="col-sm-9">
                                            <input type="text" name="quantity" class="form-control input-number"
                                                placeholder="Your Coupon Number...">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="submit" value="Apply Coupon" class="btn btn-primary">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-4 text-center">
                                <div class="total">
                                    <div class="sub">
                                        <p><span>Subtotal:</span> <span>${{ $cart_data->getSubtotal() }}</span></p>
                                        <p><span>Delivery:</span> <span>$0.00</span></p>
                                        <p><span>Discount:</span> <span>${{ $cart_data->getTotal() }}</span></p>
                                    </div>
                                    <div class="grand-total">
                                        <p><span><strong>Total:</strong></span> <span>${{ $cart_data->getSubtotal()
                                                }}</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>


    @endif

    </x-mylayouts.layout-custom>