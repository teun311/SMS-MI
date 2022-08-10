@extends('backend.master')

@section('title')
    Class
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Class', 'child' => 'Manage'])
@endsection
@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Class</h4>
                    <a href="{{ route('m_class.create') }}" class="btn btn-success float-end">
                        {{--                        <i class="mdi mdi-plus"></i>--}}
                        Create
                    </a>
                </div>
                <div class="card-body">
                    <div class="">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Class Name</th>
                                <th>Class Numeric</th>
                                <th>Note</th>
                                <th>Level</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $classes as $cls)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $cls->class_name }}</td>
                                    <td>{{ $cls->class_numeric }}</td>
                                    <td>{!! \Illuminate\Support\Str::words($cls->note ,10,'..') !!}</td>
                                    <td>{{ $cls->level }}</td>
                                    <td>{{ $cls->status == 1 ? 'Active' : 'InActive' }}</td>
                                    <td>
                                        <a href="{{ route('m_class.edit', $cls->slug) }}" class="btn btn-{{$cls->status == 1 ? 'info':'warning'}} btn-sm py-0 px-1">
                                            <i class="dripicons-document-edit"></i>
                                        </a>

                                        <form action="{{ route('m_class.destroy', $cls->slug) }}" method="post" style="display: inline-block" onsubmit="return confirm('Are you sure to delete this Role?');">
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
