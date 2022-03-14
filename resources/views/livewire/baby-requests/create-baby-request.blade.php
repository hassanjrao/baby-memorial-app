<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px">
            <h1 class="mb-3">Please Enter Your Baby Information</h1>

        </div>
        <div class="">
            <div class="row g-0 justify-content-center">
                <div class="col-lg-8 wow fadeIn" data-wow-delay="0.1s">
                    <div class="h-100 d-flex flex-column justify-content-center p-5">
                        <form wire:submit.prevent='submitRequest'>

                            <div class="bg-light rounded-circle w-50 mx-auto p-3">


                                @if ($image)
                                    <img class="img-fluid rounded-circle" src="{{ $image->temporaryUrl() }}">
                                @else
                                    <img class="img-fluid rounded-circle"
                                        src="{{ asset('front-asset/img/baby-3.jpg') }}" alt="Baby Image" />
                                @endif



                            </div>
                            <div class="bg-light rounded p-4 pt-5 mt-n5">

                                <div class="d-block text-center h6 mt-3 mb-4">
                                    <label for="formFile" class="form-label ">Baby Photo</label>
                                    <br>
                                    <div wire:loading wire:target='image'>
                                        <div id="spinner"
                                            class="show mb-2  start-50 d-flex align-items-center justify-content-center">
                                            <div class="spinner-border text-primary"
                                                style="width: 1.5rem; height: 1.5rem" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </div>
                                    </div>

                                    <input class="form-control @error('image') is-invalid @enderror" type="file"
                                        accept="image/png, image/gif, image/jpeg" id="formFile" wire:model='image'>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="d-flex align-items-center">


                                        <div class="row g-3">

                                            <div class="col-sm-4">
                                                <div class="form-floating">
                                                    <input type="text"
                                                        class="form-control border-0 @error('firstName') is-invalid @enderror"
                                                        id="firstName" wire:model="firstName" placeholder="First Name">
                                                    <label for="firstName">First Name</label>
                                                    @error('firstName')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-floating">
                                                    <input type="text"
                                                        class="form-control border-0 @error('middleName') is-invalid @enderror"
                                                        id="middleName" wire:model="middleName"
                                                        placeholder="Middle Name">
                                                    <label for="middleName">Middle Name</label>
                                                    @error('middleName')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-floating">
                                                    <input type="text"
                                                        class="form-control border-0 @error('lastName') is-invalid @enderror"
                                                        id="lastName" wire:model="lastName" placeholder="lastName">
                                                    <label for="lastName">Last Name</label>
                                                    @error('lastName')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="">
                                                    <select wire:model="gender"
                                                        class="form-select p-2 @error('gender') is-invalid @enderror">
                                                        <option value="">Boy/Girl</option>

                                                        <option value="boy">Boy</option>
                                                        <option value="girl">Girl</option>
                                                    </select>
                                                    @error('gender')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="">
                                                    <select wire:model="twinMultiple" class="form-select p-2">
                                                        <option value="">Twin/Multiple</option>

                                                        <option value="twin">Twin</option>
                                                        <option value="multiple">Multiple</option>
                                                    </select>
                                                    @error('twinMultiple')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-floating">
                                                    <input type="date"
                                                        class="form-control border-0 @error('birthDate') is-invalid @enderror"
                                                        wire:model="birthDate" id="birthDate"
                                                        placeholder="Date of Birth">
                                                    <label for="birthDate">Date of Birth</label>
                                                    @error('birthDate')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-floating">
                                                    <input type="date"
                                                        class="form-control border-0 @error('deathDate') is-invalid @enderror"
                                                        wire:model="deathDate" id="deathDate" placeholder="Date of Death">
                                                    <label for="deathDate">Date of Death</label>
                                                    @error('deathDate')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-floating">

                                                    <textarea wire:model="story" id="story"
                                                        class="form-control h-25 @error('story') is-invalid @enderror"
                                                        placeholder="Enter your story..." cols="30"
                                                        rows="3"></textarea>

                                                    <label for="story">Story</label>
                                                    @error('story')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-floating">

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input border-0" type="checkbox"
                                                            id="inTshirts" wire:model='inTshirts'>
                                                        <label class="form-check-label" for="inTshirts">Want your baby
                                                            photo to be included on the annual t-shirts?</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <br>
                                            <div class="col-12 text-center mt-4">
                                                <button class="btn btn-primary w-75" type="submit">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                            </div>


                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
