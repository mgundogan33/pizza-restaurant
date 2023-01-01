@extends('layouts.main')

@section('content')
    <section class="home-slider owl-carousel img" style="background-image: url(images/bg_1.jpg);">

        <div class="slider-item" style="background-image: url(images/bg_3.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">Our Menu</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Menu</span>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3 ">
                <div class="col-md-7 heading-section ftco-animate text-center mx-auto">

                </div>
            </div>
        </div>
        <div class="container-wrap">
            <div class="row no-gutters d-flex">

                @foreach ($product_array as $product)
                    <div class="col-lg-4 d-flex ftco-animate mx-auto">
                        <div class="services-wrap d-flex">
                            <a href="#" class="img"
                                style="background-image: url({{ asset('images/' . $product->image) }});"></a>
                            <div class="text p-4">
                                <h3>{{ $product->name }}</h3>
                                <p>{{ $product->description }} </p>


                                @if ($product->sale_price)
                                    <p class="price"><span>${{ $product->sale_price }}</span></p>
                                    <p class="price" style="text-decoration: line-through;">
                                        <span>${{ $product->price }}</span> </p>
                                @else
                                    <p class="price"><span>${{ $product->price }}</span> </p>
                                @endif

                                <form method="POST" action="{{ route('add_to_cart') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <input type="hidden" name="name" value="{{ $product->name }}">
                                    <input type="hidden" name="price" value="{{ $product->price }}">
                                    <input type="hidden" name="sale_price" value="{{ $product->sale_price }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <input type="hidden" name="image" value="{{ $product->image }}">
                                    <input type="submit" value="Order" class="btn btn-warning">
                                </form>


                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>


    </section>
@endsection
