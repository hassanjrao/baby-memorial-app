@extends('layouts.user')

@section("page-title","Sign Up")

@section('content')
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px">
                <h1 class="mb-3">Sign Up</h1>
                <p>
                    Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut
                    dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed
                    rebum vero dolor duo.
                </p>
            </div>
            <div class="">
                <div class="row g-0 justify-content-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="h-100 bg-light rounded d-flex flex-column justify-content-center p-5">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control border-0 @error('name') is-invalid @enderror" id="name"
                                                placeholder="Your Name" name="name" required>
                                            <label for="name">Your Name</label>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control border-0 @error('state') is-invalid @enderror" id="state" name="state"
                                                required placeholder="State">
                                            <label for="state">State</label>
                                            @error('state')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-floating">
                                            <input type="email" class="form-control border-0 @error('email') is-invalid @enderror" name="email" required
                                                id="email" placeholder="Your Email">
                                            <label for="email">Your Email</label>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-floating">
                                            <input type="password" class="form-control border-0 @error('password') is-invalid @enderror" name="password" required
                                                id="password" placeholder="Password">
                                            <label for="password">Password</label>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-floating">
                                            <input type="password" class="form-control border-0 @error('password') is-invalid @enderror" name="password_confirmation" required
                                                id="password-confirm" placeholder="password-confirm">
                                            <label for="password-confirm">Confirm Password</label>
                                            @error('password-confirm')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
<br>
                                    <div class="col-12 text-center mt-4">
                                        <button class="btn btn-primary w-75" type="submit">
                                            Sign up
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <div class="col-12 mt-4 text-center">
                                <a href="{{ route("login") }}">Already have an account? Log in</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
