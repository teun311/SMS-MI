@extends('backend.master')

@section('title')
    Create Class
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Class', 'child' => 'Create'])
@endsection
@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h4 class="float-start">Create Class</h4>
                                <a href="{{ route('m_class.index') }}" class="btn btn-success float-end">
                                    Manage
                                    {{--                                    <i class="dripicons-arrow-thin-left"></i>--}}
                                </a>
                            </div>
                            <div class="card-body">
                                <div>
                                    <form action="{{ isset($cls) ? route('m_class.update', $cls->slug) : route('m_class.store') }}" method="POST">
                                        @csrf
                                        @if(isset($cls))
                                            @method('put')
                                        @endif
                                        <div class="mb-3">
                                            <label class="form-label">Class Name</label>
                                            <input type="text" class="form-control" name="class_name" value="{{ isset($cls) ? $cls->class_name : '' }}" data-provide="typeahead" id="the-basics" placeholder="class name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Class Numeric</label>
                                            <input type="text" class="form-control" name="class_numeric" value="{{ isset($cls) ? $cls->class_numeric : '' }}" data-provide="typeahead" id="the-basics" placeholder="class numeric">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" >Note</label>
                                            <textarea name="note" class="form-control"  cols="30" rows="3">{{isset($cls) ? $cls->note : ''}}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Level</label>
                                            <select name="level" class="form-control"   data-placeholder="level ">
                                                <option value=""disabled selected><--Select Level---></option>
                                                <option value="{{isset($cls) ? $cls->level : 'Primary'}}" {{isset($cls) && $cls->level == 'Primary' ? 'selected' : ''}}>Primary</option>
                                                <option value="{{isset($cls) ? $cls->level : 'School'}}" {{isset($cls) && $cls->level == 'School' ? 'selected' : ''}}>School</option>
                                                <option value="{{isset($cls) ? $cls->level : 'College'}}" {{isset($cls) && $cls->level == 'College' ? 'selected' : ''}} >College</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" >Status</label>
                                            <div class="form-check-label" >
                                                <label ><input type="radio" name="status" value="1" {{isset($cls) && $cls->status == 1 ? 'checked' : ''}} >Active</label>
                                                <label ><input type="radio" name="status" value="0" {{isset($cls) && $cls->status == 0 ? 'checked' : ''}} >Disable</label>
                                            </div>

                                        </div>

                                        <div class="mb-3 float-end">
                                            <input type="submit" class="btn btn-success" data-provide="typeahead" id="" value="{{ isset($cls) ? 'Update' : 'Create' }}  Class">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
