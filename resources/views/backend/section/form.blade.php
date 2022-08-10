@extends('backend.master')

@section('title')
    Settings
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Section', 'child' => 'Create'])
@endsection
@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h4 class="float-start">Create Section</h4>
                                <a href="{{ route('m_section.index') }}" class="btn btn-success float-end">
                                    Manage
                                    {{--                                    <i class="dripicons-arrow-thin-left"></i>--}}
                                </a>
                            </div>
                            <div class="card-body">
                                <div>
                                    <form action="{{ isset($section) ? route('m_section.update', $section->id) : route('m_section.store') }}" method="POST">
                                        @csrf
                                        @if(isset($section))
                                            @method('put')
                                        @endif
                                        <div class="mb-3">
                                            <label class="form-label">Section Name</label>
                                            <input type="text" class="form-control" name="section_name" value="{{ isset($section) ? $section->section_name : '' }}" data-provide="typeahead" id="the-basics" placeholder="section name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Capacity</label>
                                            <input type="text" class="form-control" name="capacity" value="{{ isset($section) ? $section->capacity : '' }}" data-provide="typeahead" id="the-basics" placeholder="section capacity">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" >Note</label>
                                            <textarea name="note" class="form-control"  cols="30" rows="3">{{isset($section) ? $section->note : ''}}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" >Status</label>
                                            <div class="form-check-label" >
                                                <label ><input type="radio" name="status" value="1" {{isset($section) && $section->status == 1 ? 'checked' : ''}} >Active</label>
                                                <label ><input type="radio" name="status" value="0" {{isset($section) && $section->status == 0 ? 'checked' : ''}} >Disable</label>
                                            </div>

                                        </div>

                                        <div class="mb-3 float-end">
                                            <input type="submit" class="btn btn-success" data-provide="typeahead" id="" value="{{ isset($section) ? 'Update' : 'Create' }}  Section">
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
