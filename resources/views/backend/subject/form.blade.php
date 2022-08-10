@extends('backend.master')
@section('title')
    Subject
@endsection
@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Subject', 'child' => 'Create'])
@endsection
@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Create Subject</h4>
                    <a href="{{ route('subjects.index') }}" class="btn btn-success float-end">
                        Manage
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{isset($subject) ? route('subjects.update',$subject->id) : route('subjects.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($subject))
                            @method('patch')
                        @endif
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-control">
                                            <label class="form-label mt-1">Class Name </label>
                                            <select name="class_id" class="form-control"   data-placeholder="level ">
                                                <option value=""disabled selected ><--Select Class---></option>
                                                @if(isset($classes))
                                                @foreach($classes as $clss)
                                                <option value="{{$clss->id}}" {{isset($subject) && $subject->class_id == $clss->id ? 'selected' : ''}}>
                                                    {{$clss->class_name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                            <label class="py-1" for="">Group Name Title :</label>
                                            <input type="text" class="form-control" name="group_id" value="{{isset($subject)? $subject->group_id : ''}}" placeholder="group name" required>
                                            <label class="py-1" for="">Subject Name :</label>
                                            <input type="text" class="form-control" name="subject_name" value="{{isset($subject)? $subject->subject_name : ''}}" placeholder="subject name" required>
                                            <label class="py-1" for="">Subject Type :</label>
                                            <input type="text" class="form-control" name="subject_type" value="{{isset($subject)? $subject->subject_type : ''}}" placeholder="subject type" required>
                                            <label class="form-label mt-1" >Is main Subject</label>
                                            <div class="form-check-label" >
                                                <label ><input type="radio" name="is_main_subject" value="1" {{isset($subject) && $subject->is_main_subject == 1 ? 'checked' : ''}} >Active</label>
                                                <label ><input type="radio" name="is_main_subject" value="0" {{isset($subject) && $subject->is_main_subject == 0 ? 'checked' : ''}} >Disable</label>
                                            </div>
                                            <label class="py-1" for="">Pass Mark:</label>
                                            <input type="text" class="form-control" name="pass_mark" value="{{isset($subject)? $subject->pass_mark : ''}}" placeholder="pass mark"required>
                                            <label class="py-1" for="">Final Mark:</label>
                                            <input type="text" class="form-control mb-3" name="final_mark" value="{{isset($subject)? $subject->final_mark : ''}}" placeholder="final mark">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-control">
                                            <label class="form-label mt-1">Class Level</label>
                                            <select name="level" class="form-control"   data-placeholder="level ">
                                                <option value="" disabled selected><--Select Level---></option>
                                                <option value="{{isset($subject) ? $subject->level : 'Primary'}}" {{isset($subject) && $subject->level == 'Primary' ? 'selected' : ''}}>Primary</option>
                                                <option value="{{isset($subject) ? $subject->level : 'School'}}" {{isset($subject) && $subject->level == 'School' ? 'selected' : ''}}>School</option>
                                                <option value="{{isset($subject) ? $subject->level : 'College'}}" {{isset($subject) && $subject->level == 'College' ? 'selected' : ''}}>College</option>

                                            </select>
                                            <label class="py-1" for="">Subject code :</label>
                                            <input type="text" class="form-control" name="subject_code" value="{{isset($subject)? $subject->subject_code : ''}}" placeholder="subject code">
                                            <label class="py-1" for="">Subject Author:</label>
                                            <input type="text" class="form-control" name="subject_author" value="{{isset($subject)? $subject->subject_author : ''}}" placeholder="subject author">
                                            <label class="py-1" for="">Subject Book Image :</label>
                                            @if(isset($subject))
                                                <img src="{{asset($subject->sub_book_img)}}" alt="" height="50" width="75">
                                            @endif
                                            <input type="file" name="sub_book_img" accept="image/*" value="{{isset($subject)? $subject->sub_book_img : ''}}" class="form-control">

                                            <label class="form-label mt-1" >Is for Graduation</label>
                                            <div class="form-check-label" >
                                                <label ><input type="radio" name="is_for_graduation" value="1" {{isset($subject) && $subject->is_for_graduation == 1 ? 'checked' : ''}} >Active</label>
                                                <label ><input type="radio" name="is_for_graduation" value="0" {{isset($subject) && $subject->is_for_graduation == 0 ? 'checked' : ''}} >Disable</label>
                                            </div>

                                            <label class="form-label mt-1" >Is Optinal </label>
                                            <div class="form-check-label" >
                                                <label ><input type="radio" name="is_optional" value="1" {{isset($subject) && $subject->is_optional == 1 ? 'checked' : ''}} >Active</label>
                                                <label ><input type="radio" name="is_optional" value="0" {{isset($subject) && $subject->is_optional == 0 ? 'checked' : ''}} >Disable</label>
                                            </div>

                                            <label class="py-1" for=""> Note :</label>
                                            <textarea class="form-control mb-3" name="note" cols="30" rows="3" placeholder="note">{{isset($subject)? $subject->note : ''}}</textarea>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 float-end">
                            <input type="submit" class="btn btn-success" data-provide="typeahead" id="" value="{{ isset($subject) ? 'Update' : 'Create' }}  Subject">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


