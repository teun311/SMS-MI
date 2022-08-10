@extends('backend.master')

@section('title')
    Create verse
@endsection



@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'verse', 'child' => 'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h4 class="float-start">Create verse</h4>
                                <a href="{{ route('verses.index') }}" class="btn btn-success float-end">
                                    Manage
                                </a>
                            </div>
                            <div class="card-body">
                                <div>
                                    <form action="{{isset($verse) ? route('verses.update', $verse->slug) : route('verses.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($verse))
                                            @method('put')
                                        @endif
                                        <div class="col-md-12 row mt-2">
                                            <div class="col-md-6 ">
                                                <label  class="form-label">Quran Chapter </label>
                                                <select name="quran_chapter_id" class="form-control "  data-placeholder="Choose ...">
                                                    <option value="" selected hidden>---Select Chapter---</option>
                                                    @foreach($chapters as $chapter)
                                                        <option value="{{$chapter->id}}" {{isset($verse) && $verse->quran_chapter_id==$chapter->id? 'selected':''}}> {{$chapter->arabic_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6  ">
                                                <label for="disabledTextInput" class="form-label">Audio </label><br>
                                                <input type="file"  class="form-control-file mb-1" name="audio" accept="audio/*">
                                                @if(isset($verse))
                                                    <audio controls muted>
                                                        <source  src={{asset($verse->audio)}} type="audio/mpeg" >
                                                    </audio>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12 row mt-2">
                                            <div class="col-md-12 ">
                                                <label  class="form-label">Verse Arabic</label>
                                                <div id="snow-editor">
                                                    <textarea name="verse_arabic"  id="editor1" class="form-control" rows="5">{!! isset($verse) ? $verse->verse_arabic : '' !!}
                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-2 ">
                                                <label for="disabledTextInput" class="form-label">Verse Bangla</label>
                                                <div id="snow-editor">
                                                    <textarea name="verse_bangla" id="editor1" class="form-control" rows="5">{!! isset($verse) ? $verse->verse_bangla : '' !!}
                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-2 ">
                                                <label  class="form-label">Verse English</label>
                                                <div id="snow-editor">
                                                    <textarea name="verse_english" id="editor1" class="form-control" rows="5">{!! isset($verse) ? $verse->verse_english : '' !!}
                                                    </textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mt-2">
                                                <label for="" class="form-label">Status</label>
                                                <div class="col-md-9">
                                                    <label class="sm-2" for=""><input type="radio" name="status" {{isset($verse) && $verse->status == 1? 'checked':''}} value="1"> Published</label>
                                                    <label for=""><input type="radio" name="status" {{isset($verse) && $verse->status == 0? 'checked':''}} value="0"> Unpublished</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="mt-3 float-end">
                                            <input type="submit" class="btn btn-success" data-provide="typeahead" id="" value="{{ isset($verse) ? 'Update ' : 'Create ' }} Verse">
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

