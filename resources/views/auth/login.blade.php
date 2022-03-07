@extends('layouts.user')

@section('page-title', 'Login')

@section('content')
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px">
                <h1 class="mb-3">Login</h1>

            </div>
            <div class="">
                <div class="row g-0 justify-content-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="h-100 bg-light rounded d-flex flex-column justify-content-center p-5">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row g-3">


                                    <div class="col-sm-12">
                                        <div class="form-floating">
                                            <input type="email"
                                                class="form-control border-0 @error('email') is-invalid @enderror"
                                                id="email" placeholder="Your Email" name="email" required>
                                            <label for="email">Your Email</label>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-floating">
                                            <input type="password"
                                                class="form-control border-0  @error('password') is-invalid @enderror"
                                                id="password" placeholder="Password" name="password" required>
                                            <label for="password">Password</label>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-12 text-center  ">

                                        <button type="submit" class="btn btn-primary w-75 ">
                                            {{ __('Login') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link pt-3" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                            <div class="col-12 mt-4 text-center">
                                <a href="{{ route('register') }}">Don't have an account? Sign Up</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
