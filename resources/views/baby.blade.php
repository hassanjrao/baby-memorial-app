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

                    <p>
                        Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit.
                        Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit,
                        sed stet lorem sit clita duo justo magna dolore erat amet
                    </p>
                    <p class="mb-4">
                        Stet no et lorem dolor et diam, amet duo ut dolore vero eos. No
                        stet est diam rebum amet diam ipsum. Clita clita labore, dolor
                        duo nonumy clita sit at, sed sit sanctus dolor eos, ipsum labore
                        duo duo sit no sea diam. Et dolor et kasd ea. Eirmod diam at
                        dolor est vero nonumy magna.
                    </p>
                    <p class="mb-4">
                        Stet no et lorem dolor et diam, amet duo ut dolore vero eos. No
                        stet est diam rebum amet diam ipsum. Clita clita labore, dolor
                        duo nonumy clita sit at, sed sit sanctus dolor eos, ipsum labore
                        duo duo sit no sea diam. Et dolor et kasd ea. Eirmod diam at
                        dolor est vero nonumy magna.
                    </p>
                    <p class="mb-4">
                        Stet no et lorem dolor et diam, amet duo ut dolore vero eos. No
                        stet est diam rebum amet diam ipsum. Clita clita labore, dolor
                        duo nonumy clita sit at, sed sit sanctus dolor eos, ipsum labore
                        duo duo sit no sea diam. Et dolor et kasd ea. Eirmod diam at
                        dolor est vero nonumy magna.
                    </p>
                    <p class="mb-4">
                        Stet no et lorem dolor et diam, amet duo ut dolore vero eos. No
                        stet est diam rebum amet diam ipsum. Clita clita labore, dolor
                        duo nonumy clita sit at, sed sit sanctus dolor eos, ipsum labore
                        duo duo sit no sea diam. Et dolor et kasd ea. Eirmod diam at
                        dolor est vero nonumy magna.
                    </p>
                    <p class="mb-4">
                        Stet no et lorem dolor et diam, amet duo ut dolore vero eos. No
                        stet est diam rebum amet diam ipsum. Clita clita labore, dolor
                        duo nonumy clita sit at, sed sit sanctus dolor eos, ipsum labore
                        duo duo sit no sea diam. Et dolor et kasd ea. Eirmod diam at
                        dolor est vero nonumy magna.
                    </p>
                    <div class="row g-4 align-items-center">

                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                {{-- <img class="rounded-circle flex-shrink-0" src="{{ asset('front-asset/img/user.jpg') }}"
                                    alt="" style="width: 45px; height: 45px" /> --}}
                                    <h4>Author:</h4>
                                <div class="ms-3">
                                    <h6 class=" mb-1">{{ $baby->user->name }}</h6>

                                    <small>{{ $baby->created_at->format("d M, Y") }}</small>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 about-img wow fadeInUp" data-wow-delay="0.5s">
                    <div class="row">
                        <div class="col-12 text-center">
                            <img class="img-fluid w-75 rounded bg-light p-3"
                                src="{{ asset('storage/babies/'.$baby->image) }}" alt="" />
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
