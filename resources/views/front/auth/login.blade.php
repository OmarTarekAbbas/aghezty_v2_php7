@extends('front.layout')
@section('page_title')
    @lang('front.auth.login')
@stop
@section('content')
<!-- main content -->
@php
    if(App::getLocale()=='ar'){
        $dir = 'rtl';
    }
    else {
        $dir = 'ltr';
    }
@endphp
<div class="main" style="padding-top: 0;direction:{{$dir}}">
    <div class="container">
        <section class="authentication d-flex justify-content-center">
            <div class="bg-white">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="first-tab" data-toggle="tab" href="#first" role="tab"
                            aria-controls="home" aria-selected="true">
                            @lang('front.auth.register')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false">@lang('front.auth.login')</a>
                    </li>
                </ul>
                @include('errors')
                <div class="tab-content px-4 py-5" id="myTabContent">
                    <div class="tab-pane fade" id="first" role="tabpanel" aria-labelledby="home-tab">
                        <form action="{{ route('client.register.submit') }}" method="post">
                             {{ csrf_field() }}
                            <div>
                                <div class="reg-title text-center">
                                    <h5>@lang('front.auth.info')</h5>
                                </div>

                                <div class="input-box">
                                    <i class="fas fa-user"></i>
                                    <input type="text" name="name" placeholder="@lang('front.auth.name')">
                                </div>

                                <div class="input-box">
                                    <i class="fa fa-envelope"></i>
                                    <input type="email" name="email" placeholder="@lang('front.auth.email')">
                                </div>

                                <div class="input-box">
                                    <i class="fa fa-phone"></i>
                                    <input type="phone" name="phone" placeholder="@lang('front.auth.phone')">
                                </div>

                                <div class="input-box">
                                    <i class="fa fa-lock"></i>
                                    <input type="password" name="password" placeholder="@lang('front.auth.password')">
                                </div>

                                <div class="input-box">
                                    <i class="fa fa-lock"></i>
                                    <input type="password" name="password_confirmation" placeholder="@lang('front.auth.confirm_password')">
                                </div>

                                <div class="reg-title text-center">
                                    <h5>@lang('front.auth.address')</h5>
                                </div>

                                <div class="input-box text-right form-group">
                                    <i class="fas fa-map-marker"></i>
                                    <label>@lang('front.governorate')</label>
                                    {!! Form::select("governorate_id", \App\Governorate::pluck('title_'.getCode(),'id'),null, ['required' , 'class' => 'form-control dropdown-dark' ,'id' => 'gover_add']) !!}
                                </div>

                                <div class="input-box text-right form-group">
                                    <i class="fas fa-map-marker"></i>
                                    <label>@lang('front.city')</label>
                                    {!! Form::select("city_id",[],null, ['required' ,'id' => 'add_city' ,'class' => 'form-control']) !!}
                                </div>

                                <div class="input-box text-right">
                                    <i class="fas fa-keyboard" style="height: 54px;line-height: 32px;"></i>
                                    <textarea cols="30" name="address" rows="2" placeholder="@lang('front.address')" required></textarea>
                                </div>

                                <div class="authentication-info d-flex justify-content-between">

                                    <div class="remember d-flex">
                                        <div class="custom-checkbox">
                                            <input id="reg-check" type="checkbox">
                                            <span class="tick"></span>
                                        </div>
                                        <label for="reg-check">@lang('front.auth.remember')</label>
                                    </div>

                                </div>
                                <input type="submit" value="@lang('front.auth.register')" class="btn btn btn-outline-secondary btn-block mt-3">
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <form action="{{route('client.login.submit')}}" method="post">
                            {{ csrf_field() }}
                            <div>
                                <div class="input-box">
                                    <i class="fa fa-envelope"></i>
                                    <input type="email" name="email" placeholder="@lang('front.auth.email')">
                                </div>

                                <div class="input-box">
                                    <i class="fa fa-lock"></i>
                                    <input type="password" name="password" placeholder="@lang('front.auth.password')">
                                </div>

                                <div class="authentication-info d-flex justify-content-between ">

                                    <div class="remember d-flex justify-content-center align-items-center">
                                        <div class="custom-checkbox">
                                            <input id="check" type="checkbox">
                                            <span class="tick"></span>
                                        </div>
                                        <label for="reg-check">@lang('front.auth.remember')</label>
                                    </div>

                                    {{-- <div class="forget">
                                        <a href="{{ url('password/reset') }}"><span>@lang('front.auth.fore')? </span></a>
                                    </div> --}}
                                </div>
                                <input type="submit" value="@lang('front.auth.login')" class="btn btn btn-outline-secondary btn-block mt-3">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@stop
@section('script')
    <script>
        $('#gover_add').change(function(){
            $.ajax({
            url: "{{url('clients/city')}}/"+$(this).val(),
            type: "get",
            success: function(data){
            $('#add_city').empty();
                for (let i = 0; i < data.length; i++) {
                    const element = '<option value="'+data[i].id+'">'+data[i].city+'</option>'
                    $('#add_city').append(element)
                }
            },
            });
        })
        $(document).ready(function () {
        $.ajax({
            url: "{{url('clients/city')}}/"+$('#gover_add').val(),
            type: "get",
            success: function(data){
            $('#add_city').empty();
                for (let i = 0; i < data.length; i++) {
                    const element = '<option value="'+data[i].id+'">'+data[i].city+'</option>'
                    $('#add_city').append(element)
                }
            },
            });
        });
    </script>
@endsection
