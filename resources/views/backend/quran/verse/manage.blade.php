@extends('backend.master')

@section('title')
    Quran
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Quran', 'child' => 'verse'])
@endsection
@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Quran Verse</h4>
                    <a href="{{route('verses.create')}}" class="btn btn-success float-end">
                        Create
                    </a>
                    <button class="btn btn-success " id="test">test</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th> Quran Chapter</th>
                                <th> verse arabic</th>
                                <th>verse bangla</th>
                                <th>verse english</th>
                                <th>audio</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $verses as $verse)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $verse->quranChapter->arabic_name }}</td>
                                    <td>{!! \Illuminate\Support\Str::words($verse->verse_arabic,2,' ') !!}</td>
                                    <td>{!! \Illuminate\Support\Str::words($verse->verse_bangla,2,' ') !!}</td>
                                    <td>{!! \Illuminate\Support\Str::words($verse->verse_english,2,' ') !!}</td>
                                    <td>
                                        <audio controls muted><source src={{asset($verse->audio)}} type="audio/mpeg"></audio>
                                    </td>
                                    <td>{{ $verse->status == 1? 'published' : 'unpublished'}}</td>
                                    <td>
                                       <div class="d-flex">
                                           <a href="{{route('verses.show', $verse->slug)}}" id="view" class="btn btn-sm btn-success " title="view">view</a>

                                           <a href="{{route('verses.edit' , $verse->slug)}}" class="btn btn-sm btn-primary mx-1"><i class="dripicons-document-edit" title="Edit"></i></a>
                                           <form action="{{ route('verses.destroy',$verse->slug) }}" method="post" onsubmit="return confirm('Are You sure that to delete this Class'); ">
                                               @csrf
                                               @method('delete')
                                               <button type="submit" class="btn btn-danger btn-sm ">
                                                   <i class="dripicons-trash" title="Delete"></i>
                                               </button>
                                           </form>
                                       </div>
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

@section('script')
    <script>
        $('#test').click(function () {
           $.ajax({
               method : "POST",
               url: "/admin/verses",
               type:"json",
               success : function (data) {
                    console.log(data);
               }
           })
        });
    </script>
@endsection
