<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px">
            <h1 class="mb-3">Nursery</h1>
            <p>
                Stories from the parents
            </p>
        </div>
        <div class="row g-4">
            @foreach ($babies as $baby)
                <div class="col-lg-4 col-md-6 wow fadeInUp mb-3" data-wow-delay="0.1s">
                    <div class="classes-item">

                        <div class="bg-light rounded-circle w-75 mx-auto p-3">
                            @if ($baby->image)
                                <img class=" rounded-circle" src="{{ asset('storage/babies/' . $baby->image) }}"
                                    alt="Baby Image" width="100%" height="250px" />
                            @else
                                <img class=" rounded-circle" src="{{ asset('front-asset/img/baby-1.jpg') }}"
                                    alt="Baby Image" width="100%" height="250px" />
                            @endif
                        </div>
                        <div class="bg-light rounded p-4 pt-5 mt-n5" style="height: 340px">
                            <a class="d-block text-center h3 mt-3 mb-4"
                                href="{{ route('baby.show', [$baby->id, $baby->first_name]) }}">{{ $baby->fullName() }}</a>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="d-flex align-items-center flex-column">
                                    <p>
                                        {{ $baby->storyDescription() }}
                                    </p>

                                    <a href="{{ route('baby.show', [$baby->id, $baby->first_name]) }}"
                                        class="btn btn-primary btn-xs rounded-pill">Read More<i
                                            class="fa fa-arrow-right ms-3"></i></a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach




        </div>


        <div class="d-flex justify-content-center mt-5">

            <!-- Pagination -->

            {{ $babies->links() }}


            <!-- END Pagination -->

        </div>


    </div>

</div>
