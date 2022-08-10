@extends('backend.master')

@section('title')
    Teacher File
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Teacher', 'child' => 'File'])
@endsection
@section('body')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="text-capitalize float-start"> Teacher Files</h4>
                <a href="{{ route('teachers.index') }}" class="btn btn-success float-end">
                    Manage
                </a>
            </div>
            <div class="card-body">
                <div class="row ">
                    @foreach($teacherCerts as $teacherCert)
                    <div class="card col-md-3 ">
                        <div class="card-body mt-2 ml-1 p-0 ">
                            <img src="{{asset($teacherCert->file_path)}}" alt="" height="135px;">
                            <p class="">.{{$teacherCert->file_extension}}</p>
                        </div>
                        <div class="card-title mt-1">
                            <form action="{{route('files.destroy',$teacherCert->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-warning" onclick="return confirm('Are you sure to delete this file?')">delete</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <form action="{{route('files.update',$teacherId)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <label class="py-1"> Education Certificate (select multiple file)  </label>
                        <input type="file" class="form-control mb-1" name="education_cert[]" multiple>
                        <button type="submit" class="btn btn-sm btn-success">Add File</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
