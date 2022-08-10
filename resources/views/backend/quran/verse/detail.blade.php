@extends('backend.master')

@section('title')
     Verse Details
@endsection



@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'verse', 'child' => 'Details'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h4 class="float-start">Verse Details</h4>
                                <a href="{{ route('verses.index') }}" class="btn btn-success float-end">
                                    Manage
                                </a>
                            </div>
                            <div class="card-body">
                                <h4 class="text-center">{{$verse->verse_arabic}}</h4>
                                <button type="submit" id="btn">click</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
<script>
    
$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

</script>
@endsection
