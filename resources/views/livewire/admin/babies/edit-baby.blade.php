<div class="content">


    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                Update Baby
            </h3>
        </div>
        <div class="block-content block-content-full">


            <form wire:submit.prevent='updateRequest'>


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
                        <div wire:loading wire:target="image,oldImage" class="text-center mt-2">
                            <div class="spinner-border text-primary" role="status">
                                <span></span>
                            </div>
                        </div>

                        @if ($image)
                            <img src="{{ $image->temporaryUrl() }}" width="100%" height="250px">
                        @elseif($oldimage)
                            <p>Click On Image to Download</p>
                            {{-- <button wire:click="export" class="btn btn-xs btn-alt-success float-right">Download Image</button> --}}
                            <img style="cursor: pointer" wire:click="export" src="{{ asset('storage/babies/' . $oldimage) }}" width="100%" height="250px" >
                        @endif

                    </div>


                    <div class="col-lg-4 mb-4">
                        <div>
                            <label for="baby.first_name">First Name</label>
                            <input type="text" placeholder="Type First Name" wire:model="baby.first_name"
                                class="form-control @error('baby.first_name') is-invalid @enderror" />
                        </div>
                        @error('baby.first_name')
                            <div class="text-danger font-weight-bold">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-lg-4 mb-4">
                        <div>
                            <label for="baby.middle_name">Middle Name</label>
                            <input type="text" placeholder="Type Middle Name" wire:model="baby.middle_name"
                                class="form-control @error('baby.middle_name') is-invalid @enderror" />
                        </div>
                        @error('baby.middle_name')
                            <div class="text-danger font-weight-bold">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-lg-4 mb-4">
                        <div>
                            <label for="baby.last_name">Last Name</label>
                            <input type="text" placeholder="Type Last Name" wire:model="baby.last_name"
                                class="form-control @error('baby.last_name') is-invalid @enderror" />
                        </div>
                        @error('baby.last_name')
                            <div class="text-danger font-weight-bold">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>





                    <div class="col-lg-6 mb-4">
                        <div class="form-group">
                            <label for="baby.gender">Boy/Girl</label>
                            <select wire:ignore class="form-select" id="baby.gender" wire:model="baby.gender">
                                <option value="">Boy/Girl</option>

                                <option value="boy">Boy</option>
                                <option value="girl">Girl</option>
                            </select>
                        </div>
                        @error('baby.gender')
                            <div class="text-danger font-weight-bold">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="col-lg-6 mb-4">
                        <div class="form-group">
                            <label for="baby.twin_multiple">Twin/Multiple</label>
                            <select wire:ignore class="form-select" id="baby.twin_multiple"
                                wire:model="baby.twin_multiple">
                                <option value="">Twin/Multiple</option>
                                <option value="twin">Twin</option>
                                <option value="multiple">Multiple</option>
                            </select>
                        </div>
                        @error('baby.twin_multiple')
                            <div class="text-danger font-weight-bold">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="col-lg-6 mb-4">
                        <div>

                            <label for="baby.birth_date">Date of Birth:</label>
                            <input type="date" wire:model="baby.birth_date"
                                class="form-control @error('baby.birth_date') is-invalid @enderror" />
                        </div>
                        @error('baby.birth_date')
                            <div class="text-danger font-weight-bold">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-lg-6 mb-4">
                        <div>
                            <label for="baby.death_date">Date of Death</label>
                            <input type="date" wire:model="baby.death_date"
                                class="form-control @error('baby.death_date') is-invalid @enderror" />
                        </div>
                        @error('baby.death_date')
                            <div class="text-danger font-weight-bold">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="col-lg-12 mb-4">
                        <div wire:ignore>
                            <label for="baby.story">Story</label>

                            <div class="form-textarea w-full" x-data="editorApp()" x-init="init($dispatch)" wire:ignore
                                wire:key="ckEditor" x-ref="ckEditor" wire:model.debounce.9999999ms="baby.story">
                                {!! $baby->story !!}</div>

                        </div>
                        @error('baby.story')
                            <div class="text-danger font-weight-bold">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-sm-12">

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="baby.in_tshirts"
                                wire:model='baby.in_tshirts'>
                            <label class="form-check-label" for="baby.in_tshirts">Want your baby
                                photo to be included on the annual t-shirts?</label>
                        </div>

                    </div>


                    <div class="col-lg-12 text-end">

                        <button type="submit" class="btn btn-alt-primary" wire:loading.attr='disabled'>
                            <div wire:loading wire:target='updateRequest'>

                                <span class="spinner-border text-primary" role="status">

                                    <span></span>

                                </span>

                            </div>

                            <div wire:loading.remove wire:target='updateRequest'>
                                <i class="fa fa-fw fa-save"></i> Update
                            </div>

                        </button>
                    </div>



                </div>

            </form>


        </div>
    </div>

</div>

@push('js')
    <script>
        /**
         * An alpinejs app that handles CKEditor's lifecycle
         */
        function editorApp() {
            return {
                /**
                 * The function creates the editor and returns its instance
                 * @param $dispatch Alpine's magic property
                 */
                create: async function($dispatch) {
                    // Create the editor with the x-ref
                    const editor = await ClassicEditor.create(this.$refs.ckEditor);
                    // Handle data updates
                    editor.model.document.on('change:data', function() {
                        $dispatch('input', editor.getData())
                    });
                    // return the editor
                    return editor;
                },
                /**
                 * Initilizes the editor and creates a listener to recreate it after a rerender
                 * @param $dispatch Alpine's magic property
                 */
                init: async function($dispatch) {
                    // Get an editor instance
                    const editor = await this.create($dispatch);
                    // Set the initial data

                    // console.log('{!! $story !!}');
                    editor.setData(@js($story));
                    // Pass Alpine context to Livewire's
                    const $this = this;
                    // On reinit, destroy the old instance and create a new one
                    Livewire.on('reinit', async function(e) {
                        editor.destroy();
                        await $this.create($dispatch);
                    });
                }
            }
        }
    </script>
@endpush
