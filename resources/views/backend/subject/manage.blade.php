@extends('backend.master')

@section('title')
    Subject
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Subject', 'child' => 'manage'])
@endsection
@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Subject</h4>
                    <a href="{{ route('subjects.create') }}" class="btn btn-success float-end">
                        Create
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Class Name</th>
                                <th>Group Name</th>
                                <th>Subject Name</th>
                                <th>Subject Type</th>
                                <th>IS Main Sub Type</th>
                                <th>Pass Mark</th>
                                <th>Final Mark</th>
                                <th>Level</th>
                                <th>Subject Code</th>
                                <th>Subject Author</th>
                                <th>Subject Book Image</th>
                                <th>is for graduation</th>
                                <th>is optional</th>
                                <th>Note</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $subjects as $subject)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $subject->class->class_name }}</td>
                                    <td>{{ $subject->group_id }}</td>
                                    <td>{{ $subject->subject_name }}</td>
                                    <td>{{ $subject->subject_type }}</td>
                                    <td>{{ $subject->is_main_subject }}</td>
                                    <td>{{ $subject->pass_mark }}</td>
                                    <td>{{ $subject->final_mark }}</td>
                                    <td>{{ $subject->level }}</td>
                                    <td>{{ $subject->subject_code }}</td>
                                    <td>{{ $subject->subject_author }}</td>
                                    <td>
                                        <img src="{{asset($subject->sub_book_img)  }}" alt="" height="50" width="75">
                                    </td>
                                    <td>{{ $subject->is_for_graduation }}</td>
                                    <td>{{ $subject->is_optional }}</td>
                                    <td>{!! \Illuminate\Support\Str::words($subject->note,10,'') !!}</td>
                                    <td class="d-flex ">
                                        <a href="{{ route('subjects.edit', $subject->slug) }}" class="btn btn-info  btn-sm mx-1">
                                            <i class="dripicons-document-edit"></i>
                                        </a>
                                        <form action="{{ route('subjects.destroy', $subject->slug) }}" method="post" style="display: inline-block" onsubmit="return confirm('Are you sure to delete this Role?');">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm  ">
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
