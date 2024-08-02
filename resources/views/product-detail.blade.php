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
    <form action="{{route('cart.add')}}" method="POST" enctype="multipart/form-data">
        @csrf 
    <div class="row px-xl-5">
        <div class="col-lg-5 pb-5">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner border">
                    @forelse($product->galleries as $index => $gallery)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <img class="w-100 h-100" src="{{ asset('storage/' . $gallery->image) }}" alt="Image">
                        </div>
                    @empty
                        <p>No images available.</p>
                    @endforelse
                </div>
                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                </a>
                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                    <i class="fa fa-2x fa-angle-right text-dark"></i>
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
            {{-- <h3 class="font-weight-semi-bold mb-4">${{ number_format($product->price_sale, 2) }}</h3> --}}
            <div class="d-flex ">
                <h2>{{ number_format($product->price, 0, ',', '.') }} VND</h2>
                <h3 class="text-muted ml-2"><del>{{ number_format($product->price_sale, 0, ',', '.') }} VND</del></h3>
            </div>
            <p class="mb-4">{{ $product->description }}</p>
            <div class="d-flex mb-3">
                <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
                <form>
                    @forelse($sizes as $id => $size)
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-{{ $id }}" name="size">
                            <label class="custom-control-label" for="size-{{ $id }}">{{ $size }}</label>
                        </div>
                    @empty
                        <p>No sizes available.</p>
                    @endforelse
                </form>
            </div>
            <div class="d-flex mb-4">
                <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>
                <form>
                    @forelse($colors as $id => $color)
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-{{ $id }}" name="color">
                            <label class="custom-control-label" for="color-{{ $id }}">{{ $color }}</label>
                        </div>
                    @empty
                        <p>No colors available.</p>
                    @endforelse
                </form>
            </div>
            <div class="d-flex align-items-center mb-4 pt-2">
                <div class="input-group quantity mr-3" style="width: 130px;">
                    <div class="input-group-btn">
                        <button class="btn btn-primary btn-minus">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control bg-secondary text-center" value="1">
                    <div class="input-group-btn">
                        <button class="btn btn-primary btn-plus">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
            </div>
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
</form>
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
                        {{-- <div class="col-md-6">
                            <h4 class="mb-4">{{ $product->reviews_count }} review(s) for "{{ $product->name }}"</h4>
                            @forelse($product->reviews as $review)
                                <div class="media mb-4">
                                    <img src="{{ asset('img/user.jpg') }}" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                    <div class="media-body">
                                        <h6>{{ $review->user_name }}<small> - <i>{{ $review->created_at->format('d M Y') }}</i></small></h6>
                                        <div class="text-primary mb-2">
                                            @for ($i = 0; $i < 5; $i++)
                                                <i class="fas fa-star {{ $i < $review->rating ? 'text-primary' : 'text-muted' }}"></i>
                                            @endfor
                                        </div>
                                        <p>{{ $review->content }}</p>
                                    </div>
                                </div>
                            @empty
                                <p>No reviews yet.</p>
                            @endforelse
                        </div> --}}
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
                                    <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <h4 class="mb-4">Related Products</h4>
            <div class="owl-carousel related-products-carousel">
                @forelse($relatedProducts as $product)
                    <div class="product-item border mb-4">
                        <div class="product-img position-relative overflow-hidden">
                            <img width="100%" height="400px"  src="{{Storage::url($product->img_thumb) }}" alt="Image">
                        </div>
                        <div class="text-center py-4">
                            <h6 class="font-weight-semi-bold mb-2">{{ $product->name }}</h6>
                            <p class="text-muted">${{ number_format($product->price_sale, 2) }}</p>
                            {{-- <a class="btn btn-outline-dark px-3" href="{{ route('product.show', $product->id) }}">View Details</a> --}}
                        </div>
                    </div>
                @empty
                    <p>No related products found.</p>
                @endforelse
            </div>
        </div>
    </div>
    <!-- You May Also Like Start -->
<div class="container-fluid py-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">You May Also Like</span></h2>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel related-carousel">
                @foreach($relatedProducts as $product)
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img width="100%" height="400px"  src="{{ asset('storage/' . $product->img_thumb) }}" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">{{ $product->name }}</h6>
                            <div class="d-flex justify-content-center">
                                <h6>${{ number_format($product->price_sale, 2) }}</h6>
                                @if($product->price_regular)
                                    <h6 class="text-muted ml-2"><del>${{ number_format($product->price_regular, 2) }}</del></h6>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="{{route('product.detail', $product->slug)}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- You May Also Like End -->

</div>
<!-- Shop Detail End -->

@endsection
