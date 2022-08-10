@extends('backend.master')

@section('title')
    Teacher
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Teacher', 'child' => 'Create'])
@endsection
@section('body')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="text-capitalize float-start">Create Teacher</h4>
                <a href="{{ route('teachers.index') }}" class="btn btn-success float-end">
                    Manage
                </a>
            </div>
            <div class="card-body">
                <form action="{{isset($teacher) ? route('teachers.update',$teacher->id) : route('teachers.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if(isset($teacher))
                    @method('patch')
                    @endif
                <div class="row">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li class="text-danger text-center">{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col-md-6">
                        <label class="py-1" for=""> Name </label>
                        <input type="text" class="form-control mb-1" name="name" value="{{isset($teacher)? $teacher->name : ''}}" placeholder="name" >
                        <label class="py-1" for=""> Email </label>
                        <input type="email" class="form-control mb-1" name="email" value="{{isset($teacher)? $teacher->email : ''}}" placeholder="email" >
                        <label class="py-1" for=""> Phone </label>
                        <input type="text" class="form-control mb-1" name="phone" value="{{isset($teacher)? $teacher->phone : ''}}" placeholder="phone" >
                        <label class="py-1" for=""> Designation </label>
                        <input type="text" class="form-control mb-1" name="designation" value="{{isset($teacher)? $teacher->designation : ''}}" placeholder="designation" >
                        <label class="py-1" for=""> Date of Birth </label>
                        <input type="date" class="form-control mb-1" name="dob" value="{{isset($teacher)? $teacher->dob : ''}}" placeholder="date of birth" >
                        <div class="py-1">
                            <label class="form-label"> Gender </label>
                            <select name="gender" class="form-control mb-1"   data-placeholder="Gender ">
                                <option value=""disabled selected><--Select One---></option>
                                <option value="{{isset($cls) ? $cls->level : 'Male'}}" {{isset($teacher) && $teacher->gender == 'Male' ? 'selected' : ''}}>Male</option>
                                <option value="{{isset($cls) ? $cls->level : 'Female'}}" {{isset($teacher) && $teacher->gender == 'Female' ? 'selected' : ''}}>Female</option>
                                <option value="{{isset($cls) ? $cls->level : 'Others'}}" {{isset($teacher) && $teacher->gender == 'Others' ? 'selected' : ''}} >Others</option>
                            </select>
                        </div>
                        <div class="py-1">
                            <label class="form-label"> Religion </label>
                            <select name="religion" class="form-control"   data-placeholder="religion ">
                                <option value=""disabled selected><--Select One---></option>
                                <option value="{{isset($cls) ? $cls->level : 'Islam'}}" {{isset($teacher) && $teacher->religion == 'Islam' ? 'selected' : ''}}>Islam</option>
                                <option value="{{isset($cls) ? $cls->level : 'Hindu'}}" {{isset($teacher) && $teacher->religion == 'Hindu' ? 'selected' : ''}}>Hindu</option>
                                <option value="{{isset($cls) ? $cls->level : 'Chirstian'}}" {{isset($teacher) && $teacher->religion == 'Chirstian' ? 'selected' : ''}} >Chirstian</option>
                                <option value="{{isset($cls) ? $cls->level : 'Buddho'}}" {{isset($teacher) && $teacher->religion == 'Buddho' ? 'selected' : ''}} >Buddho</option>
                                <option value="{{isset($cls) ? $cls->level : 'Others'}}" {{isset($teacher) && $teacher->religion == 'Others' ? 'selected' : ''}} >Others</option>
                            </select>
                        </div>
                        <label class="py-1" for=""> Joining Date </label>
                        <input type="date" class="form-control mb-1" name="join_date" value="{{isset($teacher)? $teacher->join_date : ''}}" placeholder="joining date" >
                        <label class="py-1" for=""> Photo </label>
                        @if(isset($teacher))
                            <img src="{{asset($teacher->img)}}" alt="" height="50" width="75">
                        @endif
                        <input type="file" name="img" accept="image/*" value="{{isset($teacher)? $teacher->sub_book_img : ''}}" class="form-control mb-1">
                    </div>
                    <div class="col-md-6">

                        <label class="py-1" for=""> Address </label>
                        <textarea class="form-control mb-1" name="address" cols="30" rows="4" placeholder="address">{{isset($teacher)? $teacher->address : ''}}</textarea>
                        <label class="py-1" for="">Subject </label>
                        <input type="text" class="form-control mb-1" name="subject" value="{{isset($teacher)? $teacher->subject : ''}}" placeholder="subject">
                        <label class="py-1" for=""> Highest Education </label>
                        <input type="text" class="form-control mb-1" name="high_edu" value="{{isset($teacher)? $teacher->high_edu : ''}}" placeholder="highest education">
                        <label class="py-1"> Education Certificate (select multiple file)  </label>
                        @if(isset($teacherCerts))
                            <div class="">
                                <div class="row ">
                                    @foreach($teacherCerts as $teacherCert)
                                        <img src="{{asset($teacherCert->file_path)}}" class="col-md-3 mt-1 mb-1" alt="" height="50px;" width="50px;" >
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <input type="file" class="form-control mb-1" name="education_cert[]" multiple>
                        <label class="py-1" for=""> Created By </label>
                        <input type="text" class="form-control mb-1" name="created_by" value="{{isset($teacher)? $teacher->created_by : ''}}" placeholder="created by">
                        <label class="py-1" for="" > User Name </label>
                        <input type="text" class="form-control mb-1" name="user_name" value="{{isset($teacher)? $teacher->user_name : ''}}" placeholder="user name">
                        <label class="py-1" for=""> Password </label>
                        <input type="password" class="form-control mb-1" name="password" value="{{isset($teacher)? '' : ''}}" placeholder="{{isset($teacher)? 'old password':'user password'}}">
                        @if(isset($teacher))
                        <input type="password" class="form-control mb-1" name="new_password" value="" placeholder="new password">
                        @endif
                        <label class="form-label mt-1" > Status </label>
                        <div class="form-check-label" >
                            <label ><input type="radio" name="status"  value="1" {{isset($teacher) && $teacher->status == 1 ? 'checked' : ''}} >Active</label>
                            <label ><input type="radio" name="status" value="0" {{isset($teacher) && $teacher->status == 0 ? 'checked' : ''}} >Disable</label>
                        </div>
                    </div>
                </div>
                <div class="py-2 float-end">
                    <input type="submit" class="btn btn-success" data-provide="typeahead" id="" value="{{ isset($teacher) ? 'Update' : 'Create' }}  Teacher">
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
