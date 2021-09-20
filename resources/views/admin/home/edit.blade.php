@extends('layouts.main')

@section('title')
{{ $_panel }}

@endsection

@section('content')
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>{{ $_panel }}
                    </h2>
                </div>
            </div>
        </div>
        <div class="row clearfix">




            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        {!! Form::model($information,['route' => ['home.update',$information->id], 'method' => 'post','files'=>true]) !!}


                                <hr>
                                <div class="form-group">

                                {{ Form::label('home','Change Term For Module') }}

                                {{ Form::text('home',$setting->home,['class'=>'form-control','required'=>'required']) }}
                                </div>
                                <hr>
                                @csrf
                                @method('PUT')
                                @include('admin.home.form')
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a class="btn btn-secondary" href="{{route($base_route)}}">
                                        Close
                                    </a>
                                </div>
                                {!! Form::close() !!}

                            </div>
                        </div>

                        {{-- create form --}}
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
{{-- @include('user::common.users.links') --}}




@endsection
