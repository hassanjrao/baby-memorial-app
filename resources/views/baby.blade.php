@extends('layouts.user')

@section('page-title', 'Baby - '.$baby->fullName())

@section('content')
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px">
                <h1 class="mb-3">{{ $baby->fullName() }}</h1>

                <h4>{{ $baby->birth_date }} to {{ $baby->death_date }}</h4>

            </div>

        </div>
    </div>

    <div class="container-xxl pb-4">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">

                    {{ $baby->story }}
                    <div class="row g-4 align-items-center">

                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                {{-- <img class="rounded-circle flex-shrink-0" src="{{ asset('front-asset/img/user.jpg') }}"
                                    alt="" style="width: 45px; height: 45px" /> --}}
                                    <h4>Author:</h4>
                                <div class="ms-3">
                                    <h6 class=" mb-1">{{ $baby->user_name }}</h6>

                                    <small>{{ $baby->created_at->format("d M, Y") }}</small>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 about-img wow fadeInUp" data-wow-delay="0.5s">
                    <div class="row">
                        <div class="col-12 text-center">
                            <img class="img-fluid w-75 rounded bg-light p-3" src="{{ asset('storage/babies/'.$baby->image) }}" alt="" />
                        </div>
                    </div>
                </div>
            </div>
            {{-- MORE BABIES --}}
            @if($baby->note)
                <div class="mt-5 wow fadeInUp" data-wow-delay="0.1s">
                    <p><strong>Note from {{ $baby->user_name }}</strong></p>
                    <p class="mt-3">{{ $baby->note }}</p>
                </div>
            @endif
            <br/>
            <br/>
            <div>
                @if($previous)
                <a href="{{ route('baby.show', [$previous->id, $previous->first_name]) }}" class="btn btn-dark rounded-pill py-sm-3 px-sm-5 animated slideInRight">Previous Baby</a>
                @endif
                @if($next)
                <a href="{{ route('baby.show', [$next->id, $next->first_name]) }}" class="btn btn-dark rounded-pill py-sm-3 px-sm-5 animated slideInRight">Next Baby</a>
                @endif
            </div>
            <br/>
            <h5>Share</h5>
            <div class="d-flex pt-2">
                <a class="btn btn-outline-light btn-social" href="{{$socialShare['twitter']}}"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-outline-light btn-social" href="{{$socialShare['facebook']}}"><i class="fab fa-facebook-f"></i></a>
            </div>
        </div>
    </div>
@endsection
