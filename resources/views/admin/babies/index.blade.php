@extends("layouts.admin-backend")
@section('page-title', 'Babies - Admin')
@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/buttons.bootstrap5.min.css') }}">
@endsection



@section('content')


    <!-- Page Content -->
    <div class="content">




        <a href="{{ route("admin.babies.create") }}" class="btn btn-primary push" >Add Baby</a>



        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Babies
                </h3>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">


                    <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons fs-sm">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 80px;">#</th>

                                <th>Submitted By</th>
                                <th>Approved</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Boy/Girl</th>
                                <th>Twin/Multiple</th>
                                <th>Date of Birth</th>
                                <th>Date of Death</th>
                                <th>In Tshirt</th>
                                <th>Story</th>
                                <th style="width: 15%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($babies as $ind => $baby)
                                <tr>
                                    <td>{{ ++$ind }}</td>
                                    <td>{{ $baby->user->name }}</td>
                                    <td>
                                        @if ($baby->approved == 1)
                                            <span class="badge btn btn-xs rounded-pill bg-primary"><i
                                                    class="fa fa-check"></i>
                                                Approved</span>
                                        @else
                                            <span class="badge rounded-pill bg-danger"><i class="fa fa-hourglass-half"></i>
                                                Pending</span>
                                        @endif
                                    </td>
                                    <td>{{ $baby->first_name }}</td>
                                    <td>{{ $baby->middle_name }}</td>
                                    <td>{{ $baby->last_name }}</td>
                                    <td>
                                        @if ($baby->gender == 'boy')
                                            <span class="badge btn btn-xs rounded-pill bg-primary"><i
                                                    class="fa fa-fw fa-male"></i>
                                                Boy</span>
                                        @else
                                            <span class="badge rounded-pill bg-danger"><i class="fa fa-fw fa-female"></i>
                                                Girl</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($baby->twin_multiple == 'twin')
                                            <span class="badge btn btn-xs rounded-pill bg-success"><i
                                                    class="fa fa-fw fa-user-friends"></i>
                                                Twin</span>
                                        @else
                                            <span class="badge rounded-pill bg-info"><i
                                                    class="fa fa-fw fa-user-friends"></i>
                                                Multiple</span>
                                        @endif
                                    </td>

                                    <td>{{ $baby->birth_date }}</td>
                                    <td>{{ $baby->death_date }}</td>
                                    <td>

                                        @if ($baby->in_tshirts == 1)
                                            <span class="badge btn btn-xs rounded-pill bg-success"><i
                                                    class="fa fa-fw fa-check"></i>
                                                Yes</span>
                                        @else
                                            <span class="badge rounded-pill bg-info">
                                                No</span>
                                        @endif

                                    </td>
                                    <td>{{ $baby->storyDescription() }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Horizontal Primary">
                                            <a href="{{ route('admin.babies.edit', $baby->id) }}"
                                            class="btn btn-sm btn-alt-primary">Edit</a>
                                            <form id="form-{{ $baby->id }}"
                                                action="{{ route('admin.babies.destroy', $baby->id) }}" method="POST">
                                                @method("DELETE")
                                                @csrf
                                                <input type="button" onclick="confirmDelete({{ $baby->id }})"
                                                    class="btn btn-sm btn-alt-danger" value="Delete">

                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-bs5/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.colVis.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
@endsection
