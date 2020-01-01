@extends('front.layout')
@section('page_title')
    @lang('front.address')
@stop
@section('content')
<!-- main content -->
<div class="main" style="">
    <div class="container">
        <section class="choose-address">
            <div class="address-title text-center">
                <h5 class="border-bottom border-dark">@lang('front.choose_address')</h5>
            </div>
            @include('errors')
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0 text-right">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne">
                                @lang('front.befor_address')
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            @foreach (Auth::guard('client')->user()->cities as $key=>$item)
                            <div class="previous-address text-right">
                                <label class="check-previous-address" for="">
                                <input type="checkbox" name="" id="" onchange="(this.checked)? location.href='{{url('clients/cart?address_id='.$item->pivot->city_id.'')}}':''">
                                </label>
                                <div class="previous-address-gov text-right form-group">
                                    <i class="fas fa-map-marker"></i>
                                    <label>@lang('front.governorate')</label>
                                    {!! Form::select("governorate_id_1", \App\Governorate::pluck('title_'.getCode(),'id'),$item->governorate->id, ['required','disabled','class' => 'form-control']) !!}
                                </div>

                                <div class="previous-address-city text-right form-group">
                                    <i class="fas fa-map-marker"></i>
                                    <label>@lang('front.city')</label>
                                    {!! Form::select("city_id_1", \App\City::pluck('city_'.getCode(),'id'),$item->pivot->city_id , ['required' ,'disabled', 'class' => 'form-control']) !!}
                                </div>

                                <div class="previous-address-desc text-right">
                                    <i class="fas fa-keyboard" style="height: 54px;line-height: 32px;"></i>
                                    <textarea disabled class="w-100" cols="30"
                                        rows="2">{{$item->pivot->address}}</textarea>
                                </div>
                            </div>
                            <hr>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0 text-right">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                  @lang('front.add_address')
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="alert alert-success alert-dismissible fade show" style="display:none" role="alert">
                            <a class="close" onclick="$('.alert').hide()">×</a>
                            <strong>@lang('front.success')!</strong> <span id="success_message"></span>.
                        </div>
                        <div class="alert alert-danger alert-dismissible fade show" style="display:none" role="alert">
                            <a class="close" onclick="$('.alert').hide()">×</a>
                            <strong>@lang('front.error')!</strong> <span id="error_message" dir="ltr"></span>.
                        </div>
                        <form action="{{url('clients/add_address')}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="type" value="cart">
                            <div class="card-body">
                                <div class="new-address text-right">
                                    <h5>@lang('front.add_address')</h5>
                                    <div class="new-address-gov text-right form-group">
                                        <i class="fas fa-map-marker"></i>
                                        <label>@lang('front.governorate')</label>
                                        {!! Form::select("governorate_id", \App\Governorate::pluck('title_'.getCode(),'id'),null, ['required' ,'id' => 'gover_add' ,'class' => 'form-control']) !!}
                                    </div>

                                    <div class="new-address-city text-right form-group">
                                        <i class="fas fa-map-marker"></i>
                                        <label>@lang('front.city')</label>
                                        {!! Form::select("city_id", [],null, ['required' ,'id' => 'add_city' ,'class' => 'form-control']) !!}
                                    </div>

                                    <div class="new-address-desc text-right">
                                        <i class="fas fa-keyboard" style="height: 54px;line-height: 32px;"></i>
                                        <textarea class="w-100" cols="30" rows="2" name="address"
                                            placeholder="العنوان بالتفصيل"></textarea>
                                    </div>

                                    <div class="new-address-save">
                                        <button type="submit" class="btn btn-primary">@lang('front.save')</button>
                                        <!-- <button class="btn btn-primary" type="button">حفظ</button> -->
                                    </div>
                                </div>
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
     //add city
     $('.ajax_add_city').submit(function(e){
        e.preventDefault();
        $.ajax({
        url: $(this).attr('action'),
        type: "POST",
        data:  new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data){
            if(data.status == 'success'){
                $('.alert-success').show()
                $('.alert-danger').hide()
                $('#success_message').html(data.success)
                $('html, body').animate({
                    scrollTop: 0
                    }, 500);
                setTimeout(location.reload.bind(location), 2000);
            }
            else{
                $('.alert-danger').show()
                $('.alert-success').hide()
                var lis= []
                for (const [key, value] of Object.entries(data.error )) {
                    var li = '<li>'+value+'</li>';
                    lis.push(li)
                }
                $('#error_message').html(lis)
                $('html, body').animate({
                    scrollTop: 0
                }, 500);
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
