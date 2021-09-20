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
            <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card">
                        <div class="body">

                            <div class="col-lg-12 col-md-12">


                                {!! Form::model($information,['route' => ['setting.update'], 'method' => 'post','files'=>true]) !!}

                                @csrf
                                <hr>

                                <hr>

                                <div class="form-group">
                                    {{ Form::label('system_name','System Name') }}
                                    {{ Form::text('system_name',null,['class'=>'form-control']) }}
                                </div>


                                <div class="form-group">
                                    {{ Form::label('header_text','Header Text') }}
                                    {{ Form::textarea('header_text',null,['class'=>'form-control']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('footer_text','Footer Text') }}
                                    {{ Form::textarea('footer_text',null,['class'=>'form-control']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('about_us','About Us') }}
                                    {{ Form::textarea('about_us',null,['class'=>'form-control']) }}
                                </div>



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
{{-- @include('user::common.users.links') --}}




@endsection
