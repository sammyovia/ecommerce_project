<x-mylayouts.layout-custom>



    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="bread"><span><a href="{{ route('home.index') }}">Home</a></span> / <span>Shop</span></p>
                </div>
            </div>
        </div>
    </div>



    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap');
body{ background-color: #f5f5f5; }
h1 { padding: 0 0 30px;}
a:hover{ text-decoration:none;}
.product-grid{
    background-color: #fff;
    font-family: 'Outfit', sans-serif;
}
.product-grid .product-image{ 
    position: relative; 
    overflow: hidden;
}
.product-grid .product-image a.image{
    display: block;
    overflow: hidden;
    position: relative;
}
.product-grid .product-image img{
    width: 100%;
    height: auto;
}
.product-image .pic-1{
    backface-visibility: hidden;
    transition: all 0.5s;
}
.product-grid:hover .product-image .pic-1{ opacity: 0; }
.product-image .pic-2{
    width: 100%;
    height: 100%;
    transform: translateX(-120%);
    position: absolute;
    top: 0;
    left: 0;
    transition: all 0.3s;
}
.product-grid:hover .product-image .pic-2{ transform: translateX(0); }
.product-grid .product-sale-label{
    color: #222;
    font-size: 14px;
    font-weight: 500;
    text-transform: capitalize;
    padding: 0 5px;
    transform: translateX(-60px);
    position: absolute;
    top: 10px;
    left: 10px;
    transition: all 500ms ease-in-out 0s;
}
.product-grid:hover .product-sale-label{ transform: translateX(0); }
.product-grid .product-like-icon{
    color: #333;
    font-size: 18px;
    line-height: 18px;
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 1;
    transition: all 0.3s ease 0s;
}
.product-grid:hover .product-like-icon:hover{ color: #eb2f06; }   
.product-grid .product-button-group{
    font-size: 0;
    width: 100%;
    opacity: 1;
    text-align: center;
    transform: translateX(-50%);
    position: absolute;
    left: 50%;
    bottom: 20px;
    transition: all .3s ease-out 0s;
}
.product-grid:hover .product-button-group{ opacity: 1; }
.product-grid .product-button-group a{
    color: #fff;
    background: #000;
    font-size: 14px;
    font-weight: 600;
    text-transform: uppercase;
    line-height: 43px;
    height: 45px;
    width: 40px;
    position:relative;
    display: inline-block;
    transition: all 0.3s;
}
.product-grid .product-button-group a i{line-height:inherit;}
.product-grid .product-button-group a:before{
    content: "";
    background: #eb2f06;
    width: 0;
    height: 100%;
    position: absolute;
    top: auto;
    bottom: 0;
    left: auto;
    right: 0;
    transition: all .4s ease-in-out 0s;
    z-index: -1;
}
.product-grid .product-button-group a:hover:before{
    width: 100%;
    right: auto;
    left: 0;
}
.product-grid .product-button-group a.add-to-cart{
    width: calc(100% - 87.5px);
    margin: 0 3px;
    transform: translateY(100px);
}
.product-grid .product-button-group a:nth-child(1){ transform: translateX(-45px); }
.product-grid .product-button-group a:nth-child(3){ transform: translateX(45px); }
.product-grid:hover .product-button-group a.add-to-cart{ transform: translateY(0); }
.product-grid:hover .product-button-group a{ transform: translate(0); }
.product-grid .product-button-group a:hover{ color: #fff; }
.product-grid .product-content{ padding: 12px; }
.product-grid .title{
    font-size: 17px;
    font-weight: 600;
    text-transform: capitalize;
    margin: 0 0 5px;
}
.product-grid .title a{
    color: #262626;
    transition: all 0.5s ease;
}
.product-grid .title a:hover{ color: #eb2f06; }
.product-grid .price{
    color: #eb2f06;
    font-size: 16px;
    font-weight: 500;
    margin: 0 2px;
}
.product-grid .price span{
    color: #999;
    text-decoration: line-through;
}
@media screen and (max-width:990px){
    .product-grid{ margin: 0 0 30px; }
}
    </style>

    <div class="container">

        <div class="row">
            @foreach ($product_data as $data)

            <div class="col-md-3 col-sm-6">
                <div class="product-grid mb-3">
                    <div class="product-image">
                        <a href="{{ $data->getLink($data->id) }}" class="image">
                            <img src="{{ $data->getImage() }}">
                        </a>
                        <ul class="product-links">
                            <li><a href="#"><i class="fa fa-eye"></i></a></li>
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                            <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product-content">
                        <span class="category"><a href="{{ $data->getLink($data->id) }}">PIZZA</a></span>
                        <h3 class="title"><a href="{{ $data->getLink($data->id) }}">{{ $data->title }}</a></h3>
                        <div class="price">${{ $data->price }}</div>
                    </div>
                </div>
            </div>

            @endforeach


        </div>

    </div>


</x-mylayouts.layout-custom>