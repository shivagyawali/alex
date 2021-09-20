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
            <a class="btn btn-success" href="{{ route('terms-and-conditions.create') }}">Create {{ $setting->terms_and_conditions }}</a>


            <div class="col-lg-12">
                <div class="card">
                    <div class="tab-content mt-0">
                        <div class="tab-pane  @if(!session()->get('errors')) active show @endif" id="Users">
                            <div class="table-responsive">



                                <table class="table table-hover table-custom spacing8">
                                    <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>Pdf</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $count =1;
                                        @endphp

                                        @foreach ($informations as $value)

                                        <tr>
                                            <td>

                                                {{ $count++ }}

                                            </td>


                                            {{-- <td>{{ $value->category->title }}</td> --}}

                                            <td>
                                                <a href="{{ asset('uploads/'.$value->pdf) }}" target="_blank">View Pdf</a>
                                                </td>
                                            {{-- <td>{{ $value->brand->title }}</td> --}}


                                            <td>
                                                @if($value->status)
                                                Active
                                                @else
                                                InActive
                                                @endif

                                            </td>
                                            <td>{{date('d M, Y',strtotime($value->created_at))}}</td>
                                            <td>

                                                <a href="{{route('terms-and-conditions.edit',$value->id)}}"> <i
                                                        class="icon-pencil"></i> </a>
                                                </a>



                                                <form method="post" action="{{ route('terms-and-conditions.destroy',$value->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this item?')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
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
        </div>
    </div>
</div>
{{-- @include('user::common.users.links') --}}




@endsection
