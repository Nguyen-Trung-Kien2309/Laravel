@extends('layouts.app')
@section('content')
<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Shop Detail</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="{{ url('/') }}">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Shop Detail</p>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Shop Detail Start -->
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 pb-5">
            <!-- Carousel for product galleries -->
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner border">
                    @forelse($product->galleries as $index => $gallery)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <img class="d-block w-100" height="600px" src="{{ asset('storage/' . $gallery->image) }}" alt="Image">
                        </div>
                    @empty
                        <p>No images available.</p>
                    @endforelse
                </div>
                <a class="carousel-control-prev" href="#product-carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#product-carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <div class="col-lg-7 pb-5">
            <h3 class="font-weight-semi-bold">{{ $product->name }}</h3>
            <div class="d-flex mb-3">
                <div class="text-primary mr-2">
                    @for ($i = 0; $i < 5; $i++)
                        <small class="fas fa-star {{ $i < $product->averageRating ? 'text-primary' : 'text-muted' }}"></small>
                    @endfor
                </div>
                <small class="pt-1">({{ $product->reviews_count }} Reviews)</small>
            </div>
            <div class="d-flex">
                <h2>{{ number_format($product->price, 0, ',', '.') }} VND</h2>
                <h3 class="text-muted ml-2"><del>{{ number_format($product->price_sale, 0, ',', '.') }} VND</del></h3>
            </div>
            <p class="mb-4">{{ $product->description }}</p>

            <!-- Add to Cart Form -->
            <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <div class="d-flex mb-3">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
                    @forelse($sizes as $id => $size)
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" name="product_size_id" id="size-{{ $id }}" value="{{ $id }}" required>
                            <label class="custom-control-label" for="size-{{ $id }}">{{ $size }}</label>
                        </div>
                    @empty
                        <p>No sizes available.</p>
                    @endforelse
                </div>
                <div class="d-flex mb-4">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>
                    @forelse($colors as $id => $color)
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" name="product_color_id" id="color-{{ $id }}" value="{{ $id }}" required>
                            <label class="custom-control-label" for="color-{{ $id }}">{{ $color }}</label>
                        </div>
                    @empty
                        <p>No colors available.</p>
                    @endforelse
                </div>
                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-minus" type="button">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="number" class="form-control bg-secondary text-center" name="quantity" id="quantity" min="1" value="1" required>
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus" type="button">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
                </div>
            </form>

            <div class="d-flex pt-2">
                <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                <div class="d-inline-flex">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-pinterest"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row px-xl-5">
        <div class="col">
            <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
                <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Information</a>
                <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Reviews ({{ $product->reviews_count }})</a>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-pane-1">
                    <h4 class="mb-3">Product Description</h4>
                    <p>{{ $product->description }}</p>
                </div>
                <div class="tab-pane fade" id="tab-pane-2">
                    <h4 class="mb-3">Additional Information</h4>
                    <p>{{ $product->additional_information }}</p>
                </div>
                <div class="tab-pane fade" id="tab-pane-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-4">Leave a review</h4>
                            <small>Your email address will not be published. Required fields are marked *</small>
                            <div class="d-flex my-3">
                                <p class="mb-0 mr-2">Your Rating * :</p>
                                <div class="text-primary">
                                    @for ($i = 0; $i < 5; $i++)
                                        <i class="far fa-star"></i>
                                    @endfor
                                </div>
                            </div>
                            <form action="" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="message">Your Review *</label>
                                    <textarea id="message" name="content" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="name">Your Name *</label>
                                    <input type="text" class="form-control" id="name" name="user_name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Your Email *</label>
                                    <input type="email" class="form-control" id="email" name="user_email">
                                </div>
                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-primary px-3">Leave Your Review</button>
                                </div>
                            </form>
                        </div>
                        {{-- <div class="col-md-6">
                            <h4 class="mb-4">{{ $product->reviews_count }} review for "{{ $product->name }}"</h4>
                            @foreach ($product->reviews as $review)
                                <div class="media mb-4">
                                    <img src="{{ asset('storage/avatars/' . $review->user->avatar) }}" alt="User Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                    <div class="media-body">
                                        <h6>{{ $review->user->name }}<small> - <i>{{ $review->created_at->format('M d, Y') }}</i></small></h6>
                                        <div class="text-primary mb-2">
                                            @for ($i = 0; $i < 5; $i++)
                                                <i class="fas fa-star {{ $i < $review->rating ? 'text-primary' : 'text-muted' }}"></i>
                                            @endfor
                                        </div>
                                        <p>{{ $review->content }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Detail End -->
<script>
   
    $(document).ready(function() {
        $('.btn-plus').click(function() {
            var quantityInput = $(this).closest('.quantity').find('input[name="quantity"]');
            var currentQuantity = parseInt(quantityInput.val());
            quantityInput.val(currentQuantity + 1);
        });

        $('.btn-minus').click(function() {
            var quantityInput = $(this).closest('.quantity').find('input[name="quantity"]');
            var currentQuantity = parseInt(quantityInput.val());
            if (currentQuantity > 1) {
                quantityInput.val(currentQuantity - 1);
            }
        });
    });


</script>
@endsection
