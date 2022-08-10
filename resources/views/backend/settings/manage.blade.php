@extends('backend.master')

@section('title')
    Settings
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Settings', 'child' => ''])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills nav-justified ">
                <li class="nav-item border rounded-3" style="background:#e5edff" >
                    <button class="nav-link active"  data-bs-toggle="pill" data-bs-target="#general" type="button" aria-selected="true">General Setting</button>
                </li>
                <li class="nav-item border rounded-3" style="background:#e5edff" >
                    <button class="nav-link"  data-bs-toggle="pill" data-bs-target="#payment" type="button"   aria-selected="false">Payment Setting</button>
                </li>
                <li class="nav-item border rounded-3" style="background:#e5edff" >
                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#email" type="button" aria-selected="false">Email Setting</button>
                </li>
                <li class="nav-item border rounded-3" style="background:#e5edff" >
                    <button class="nav-link"  data-bs-toggle="pill" data-bs-target="#social" type="button"  aria-selected="false">Social Links</button>
                </li>
                <li class="nav-item border rounded-3" style="background:#e5edff" >
                    <button class="nav-link"  data-bs-toggle="pill" data-bs-target="#seo" type="button"  aria-selected="false">SEO Settings</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="general" role="tabpanel" >
                    general
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header fw-bold">Website BAsic Details</div>
                                    <div class="card-body">
                                        <form action="{{isset($setting) ? route('settings.update',$setting->id) : route('settings.store')}}" method="post" enctype="multipart/form-data">
                                            @csrf

                                            @if(isset($setting))
                                                @method('put')
                                            @endif
                                        <div class="form-control">
                                            <input type="hidden" name="setting_category" value="{{isset($setting) ? 'basic' : 'basic'}}" >
                                            <label class="py-1" for="">Website Title :</label>
                                            <input type="text" class="form-control" name="site_title" value="{{isset($setting)? $setting->site_title : ''}}" placeholder="title" required>
                                            <label class="py-1" for="">Website Name :</label>
                                            <input type="text" class="form-control" name="site_name" value="{{isset($setting)? $setting->site_name : ''}}" placeholder="name" required>
                                            <label class="py-1" for="">Website Banner :</label>
                                            <input type="text" class="form-control" name="site_banner" value="{{isset($setting)? $setting->site_banner : ''}}" placeholder="banner" required>
                                            <label class="py-1" for="">Website Logo :</label>
                                            @if(isset($setting))
                                                <img src="{{asset($setting->site_logo)}}" alt="" style="height: 50px;width:75px; ">
                                            @endif
                                            <input type="file" name="site_logo"  accept="image/*" value="{{isset($setting)? $setting->site_logo : ''}}" class="form-control" >
                                            <label class="py-1" for="">Website favicon :</label>
                                            @if(isset($setting))
                                                <img src="{{asset($setting->site_icon)}}" alt="" height="50" width="75">
                                            @endif
                                            <input type="file" name="site_icon" accept="image/*" value="{{isset($setting)? $setting->site_icon : ''}}" class="form-control">

                                        </div>
                                            <input type="submit" value="{{isset($setting) ? 'Update' : 'Update'}}" class="btn btn-success mt-1 float-end ">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header fw-bold">Address Details</div>
                                    <div class="card-body">
                                        <form action="{{isset($setting)? route('settings.update',$setting->id) : route('settings.store')}}" method="post" >
                                            @csrf
                                            @if(isset($setting))
                                                @method('put')
                                            @endif
                                        <div class="form-control">
                                            <input type="hidden" name="setting_category" value="{{isset($setting) ? 'address' : 'address'}}" >
                                            <label class="py-1" for="">Website Address :</label>
                                            <textarea class="form-control" name="site_address" cols="30" rows="2" placeholder="site_address" required>{{isset($setting)? $setting->site_address : ''}}</textarea>
                                            <label class="py-1" for="">Website District :</label>
                                            <input type="text" class="form-control" name="site_dist" value="{{isset($setting)? $setting->site_dist : ''}}" placeholder="district">
                                            <label class="py-1" for="">Website Division :</label>
                                            <input type="text" class="form-control" name="site_division" value="{{isset($setting)? $setting->site_division : ''  }}" placeholder="division">
                                            <label class="py-1" for="">Website Country :</label>
                                            <input type="text" class="form-control" name="site_country"value="{{isset($setting)? $setting->site_country : ''}}" placeholder="country">
                                            <label class="py-1" for="">Website Metadata :</label>
                                            <input type="text" class="form-control" name="site_meta" value="{{isset($setting)? $setting->site_meta : ''}}" placeholder="meta">


                                        </div>
                                            <input type="submit" value="{{isset($setting) ? 'update' : 'Update'}}" class="btn btn-success mt-1  float-end " >
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                </div>
                <div class="tab-pane fade" id="payment" role="tabpanel" >payment</div>
                <div class="tab-pane fade" id="email" role="tabpanel" >email</div>
                <div class="tab-pane fade" id="social" role="tabpanel" >social</div>
                <div class="tab-pane fade" id="seo" role="tabpanel" >SEO</div>
            </div>
        </div>
    </div>
@endsection
