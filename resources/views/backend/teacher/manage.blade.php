@extends('backend.master')

@section('title')
    Teacher
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Teacher', 'child' => 'Manage'])
@endsection
@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Teacher</h4>
                    <a href="{{ route('teachers.create') }}" class="btn btn-success float-end">
                        Create
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th> Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                         <!--       <th>Designation </th>
                                <th>Date of Birth  </th>
                                <th>Gender</th>
                                <th>Religion </th> -->
                                <th>Photo</th>
                        <!--  <th>Address</th>
                                <th>Subject </th>
                                <th>Highest Education </th>
                                <th>Education Certificate </th>  -->
                                <th> Created By</th>
                                <th>User Name </th>
                         <!--       <th>Password</th> -->
                                <th>Status</th>
                                <th class="text-center">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($teachers as $teacher)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$teacher->name}}</td>
                                    <td>{{$teacher->email}}</td>
                                    <td>{{$teacher->phone}}</td>
                                    <td>
                                        <img src="{{asset($teacher->img)}}" alt="" style="height: 50px;width: 50px;">
                                    </td>
                                    <td>{{$teacher->created_by}}</td>
                                    <td>{{$teacher->user_name}}</td>
                           <!--         <td></td> -->
                                    <td>{{$teacher->status == 1 ? 'Active': 'InActive'}}</td>
                                    <td class=" d-flex" >
                                        <a href="{{route('files.show',$teacher->id)}}" class="btn btn-sm btn-warning mx-1">
                                            <i class="dripicons-photo"></i>
                                        </a>
                                        <a href="" class="btn btn-sm btn-warning">
                                            <i class="dripicons-document"></i>
                                        </a>
                                        <a href="{{route('teachers.edit',$teacher->id)}}" class="btn btn-sm btn-info mx-1">
                                            <i class="dripicons-document-edit"></i>
                                        </a>
                                        <form action="{{route('teachers.destroy',$teacher->slug)}}" method="post" onsubmit="return confirm('Are you sure to delete this Teacher?');">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm  mx-0">
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
