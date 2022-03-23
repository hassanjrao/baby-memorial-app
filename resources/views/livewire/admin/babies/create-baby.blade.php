<div class="content">

    <a href="{{ route("admin.babies.index") }}" class="btn btn-primary push" >Back to All</a>


    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                Add New Request
            </h3>
        </div>
        <div class="block-content block-content-full">


            <form wire:submit.prevent='addRequest'>


                <div class="row push">

                    <div class="col-lg-6 mb-4">
                        <div wire:ignore>
                            <label for="image">Image </label>
                            <input type="file" class="form-control" wire:model='image' id="image">
                        </div>

                        @error('image')
                            <div class="text-danger font-weight-bold">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div wire:loading wire:target="image,oldimage" class="text-center mt-2">
                            <div class="spinner-border text-primary" role="status">
                                <span></span>
                            </div>
                        </div>

                        @if ($image)
                            <img src="{{ $image->temporaryUrl() }}" width="100%" height="250px">
                        @endif
                    </div>


                    <div class="col-lg-4 mb-4">
                        <div>
                            <label for="firstName">First Name</label>
                            <input type="text" placeholder="Type First Name" wire:model="firstName"
                                class="form-control @error('firstName') is-invalid @enderror" />
                        </div>
                        @error('firstName')
                            <div class="text-danger font-weight-bold">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-lg-4 mb-4">
                        <div>
                            <label for="middleName">Middle Name</label>
                            <input type="text" placeholder="Type Middle Name" wire:model="middleName"
                                class="form-control @error('middleName') is-invalid @enderror" />
                        </div>
                        @error('middleName')
                            <div class="text-danger font-weight-bold">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-lg-4 mb-4">
                        <div>
                            <label for="lastName">Last Name</label>
                            <input type="text" placeholder="Type Last Name" wire:model="lastName"
                                class="form-control @error('lastName') is-invalid @enderror" />
                        </div>
                        @error('lastName')
                            <div class="text-danger font-weight-bold">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>





                    <div class="col-lg-6 mb-4">
                        <div class="form-group">
                            <label for="gender">Boy/Girl</label>
                            <select wire:ignore class="form-select" id="gender" wire:model="gender">
                                <option value="">Boy/Girl</option>

                                <option value="boy">Boy</option>
                                <option value="girl">Girl</option>
                            </select>
                        </div>
                        @error('gender')
                            <div class="text-danger font-weight-bold">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="col-lg-6 mb-4">
                        <div class="form-group">
                            <label for="twinMultiple">Twin/Multiple</label>
                            <select wire:ignore class="form-select" id="twinMultiple" wire:model="twinMultiple">
                                <option value="">Twin/Multiple</option>
                                <option value="twin">Twin</option>
                                <option value="multiple">Multiple</option>
                            </select>
                        </div>
                        @error('twinMultiple')
                            <div class="text-danger font-weight-bold">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="col-lg-6 mb-4">
                        <div>
                            <label for="birthDate">Date of Birth</label>
                            <input type="text" wire:model="birthDate"
                                class="form-control @error('birthDate') is-invalid @enderror" />
                        </div>
                        @error('birthDate')
                            <div class="text-danger font-weight-bold">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-lg-6 mb-4">
                        <div>
                            <label for="deathDate">Date of Death</label>
                            <input type="text" wire:model="deathDate"
                                class="form-control @error('deathDate') is-invalid @enderror" />
                        </div>
                        @error('deathDate')
                            <div class="text-danger font-weight-bold">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="col-lg-12 mb-4">
                        <div>
                            <label for="story">Story</label>
                            <div wire:ignore>
                                <textarea x-data="ckeditor()" x-init="init($dispatch)" wire:key="ckEditor" x-ref="ckEditor"
                                    wire:model.debounce.9999999ms="story"
                                    class="form-control @error('story') is-invalid @enderror">The Story...</textarea>

                            </div>

                        </div>
                        @error('story')
                            <div class="text-danger font-weight-bold">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-sm-12 mb-4">

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inTshirts" wire:model='inTshirts'>
                            <label class="form-check-label" for="inTshirts">Want your baby
                                photo to be included on the annual t-shirts?</label>
                        </div>

                    </div>

                    <div class="col-sm-6">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" wire:model="approved" id="flexSwitchCheckChecked" checked>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Approved</label>
                        </div>
                    </div>


                    <div class="col-sm-6 text-end">

                        <button type="submit" class="btn btn-alt-primary" wire:loading.attr='disabled'>
                            <div wire:loading wire:target='addRequest'>

                                <span class="spinner-border text-primary" role="status">

                                    <span></span>

                                </span>

                            </div>

                            <div wire:loading.remove wire:target='addRequest'>
                                <i class="fa fa-fw fa-save"></i> Add
                            </div>

                        </button>
                    </div>



                </div>

            </form>


        </div>
    </div>

</div>

@section('js-after')

@endsection
