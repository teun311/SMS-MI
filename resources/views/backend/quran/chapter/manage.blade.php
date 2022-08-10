@extends('backend.master')

@section('title')
    Quran
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Quran', 'child' => 'Chapter'])
@endsection
@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Quran Chapter</h4>
                    <a href="{{route('chapters.create')}}" class="btn btn-success float-end">
                        Create
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th> arabic name</th>
                                <th>bangla name</th>
                                <th>english name</th>
                                <th>chapter serial</th>
                                <th> total verse </th>
                                <th>surah origin </th>
                                <th>Status</th>
                                <th class="text-center">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                                @foreach($chapters as $chapter)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$chapter->arabic_name}}</td>
                                        <td>{{$chapter->bangla_name}}</td>
                                        <td>{{$chapter->english_name}}</td>
                                        <td>{{$chapter->chapter_serial}}</td>
                                        <td>{{$chapter->total_verse}}</td>
                                        <td>{{$chapter->surah_origin == 1 ? 'Madani' : 'Makki'}}</td>
                                        <td>{{$chapter->status == 1 ? 'active' : 'inactive' }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{route('chapters.edit',$chapter->slug)}}" class="btn btn-primary btn-sm mx-1"><i class="dripicons-document-edit"></i></a>
                                                <form action="{{ route('chapters.destroy',$chapter->slug) }}" method="post" style="display: inline-block"  onsubmit="return confirm('Are You sure that to delete this Chapter'); ">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm ">
                                                        <i class="dripicons-trash"></i>
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
