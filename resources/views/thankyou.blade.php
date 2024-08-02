@extends('layouts.app')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Thank You</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('home') }}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Thank You</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Thank You Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-12">
                <div class="alert alert-success">
                    <h4 class="font-weight-semi-bold">Thank You!</h4>
                    <p>Your order has been placed successfully. We will process your order shortly and send you a confirmation email.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Thank You End -->
@endsection
