@extends('backend.master')

@section('title')
    Academic
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Section', 'child' => 'Manage'])
@endsection
@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Section</h4>
                    <a href="{{ route('m_section.create') }}" class="btn btn-success float-end">
                        Create
                    </a>
                </div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Section Name</th>
                                <th>Capacity</th>
                                <th>Note</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $sections as $sec)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $sec->section_name }}</td>
                                    <td>{{ $sec->capacity }}</td>
                                    <td>{!! \Illuminate\Support\Str::words( $sec->note ,10,'..') !!}</td>
                                    <td>{{ $sec->status == 1 ? 'Active' : 'InActive' }}</td>
                                    <td>
                                        <a href="{{ route('m_section.edit', $sec->slug) }}" class="btn btn-{{$sec->status == 1 ? 'info':'warning'}} btn-sm py-0 px-1">
                                            <i class="dripicons-document-edit"></i>
                                        </a>
                                        <form action="{{ route('m_section.destroy', $sec->slug) }}" method="post" style="display: inline-block" onsubmit="return confirm('Are you sure to delete this Role?');">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm py-0 px-1">
                                                <i class="dripicons-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <!-- Datatables css -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
@endsection

@section('script')
    <!-- Datatables js -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap5.min.js"></script>


    <script>
        $(document).ready(function () {
            $('#datatable-buttons').DataTable();
        });

    </script>
@endsection
