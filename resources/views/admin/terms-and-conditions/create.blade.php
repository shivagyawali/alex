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


                                {!! Form::open(['route' => 'terms-and-conditions.store', 'method' => 'post','files'=>true]) !!}

                                @csrf
                                @include('admin.terms-and-conditions.form')
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Add</button>
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
