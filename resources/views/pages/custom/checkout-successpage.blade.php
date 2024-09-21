<x-mylayouts.layout-custom>



    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="bread"><span><a href="{{ route('home.index') }}">Home</a></span> / <span>Purchase
                            Complete</span></p>
                </div>
            </div>
        </div>
    </div>


    <div class="colorlib-product">
        <div class="container">

            <div class="row">
                <div class="col-sm-10 offset-sm-1 text-center">
                    <p class="icon-addcart"><span><i class="icon-check"></i></span></p>
                    <h2 class="mb-4">Thank you for purchasing, Your order is complete</h2>
                    <p>
                        <a href="route('home.index')" class="btn btn-primary btn-outline-primary">Home</a>
                        <a href="{{ route('products.index') }}" class="btn btn-primary btn-outline-primary"><i
                                class="icon-shopping-cart"></i> Continue Shopping</a>
                    </p>
                </div>
            </div>
        </div>
    </div>






</x-mylayouts.layout-custom>