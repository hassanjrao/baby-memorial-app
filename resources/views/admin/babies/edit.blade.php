@extends("layouts.admin-backend")
@section('page-title', 'Edit baby - Admin')
@section('css_before')


    <!-- Page JS Plugins CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('js/plugins/cropperjs/cropper.min.css') }}"> --}}
@endsection



@section('content')


    <!-- Page Content -->


<livewire:admin.babies.edit-baby :baby="$baby">

    <!-- END Page Content -->
@endsection

@section('js_after')
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>

    <!-- Page JS Plugins -->

    <!-- Page JS Plugins -->
    {{-- <script src="{{ asset('js/plugins/cropperjs/cropper.min.js') }}"></script> --}}

    <!-- Page JS Code -->
    {{-- <script src="{{ asset('js/pages/be_comp_image_cropper.min.js') }}"></script> --}}

@endsection
