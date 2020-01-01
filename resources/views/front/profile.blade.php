@extends('front.layout')
@section('page_title')
	@lang('front.profile')
@stop
@section('content')
<!-- main content -->
<style>
.avatar-upload {
  position: relative;
  max-width: 205px;
  margin: 50px auto;
}
.avatar-upload .avatar-edit {
  position: absolute;
  right: 12px;
  z-index: 1;
  top: 10px;
}
.avatar-upload .avatar-edit input {
  display: none;
}
.avatar-upload .avatar-edit input + label {
  display: inline-block;
  width: 34px;
  height: 34px;
  margin-bottom: 0;
  border-radius: 100%;
  background: #FFFFFF;
  border: 1px solid transparent;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
  cursor: pointer;
  font-weight: normal;
  transition: all 0.2s ease-in-out;
}
.avatar-upload .avatar-edit input + label:hover {
  background: #f1f1f1;
  border-color: #d6d6d6;
}
.avatar-upload .avatar-edit input + label:after {
  content: "\f304";
  font-family: 'Font Awesome 5 Free';
  font-weight: 900;
  color: #757575;
  line-height: 16px;
  position: absolute;
  top: 10px;
  left: 0;
  right: 0;
  text-align: center;
  margin: auto;
}
.avatar-upload .avatar-preview {
  width: 192px;
  height: 192px;
  position: relative;
  border-radius: 100%;
  border: 6px solid #F8F8F8;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}
.avatar-upload .avatar-preview > div {
  width: 100%;
  height: 100%;
  border-radius: 100%;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}

</style>
@if(App::getLocale() == 'en')
<style>
#user{
    direction: ltr;
}
.subtotal-title{
    float: left;
    text-align: left;
}
.subtotal-value{
    text-align: right;
}
</style>
@endif
<div class="main">
    <div id="user" class="container-fluid profile">
        <div class="">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                        aria-controls="profile" aria-selected="true">@lang('front.my_profile')</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab"
                        aria-controls="address" aria-selected="false">@lang('front.my_address')</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab"
                        aria-controls="password" aria-selected="false">@lang('front.change_password')</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" id="myOrder-tab" data-toggle="tab" href="#myOrder" role="tab"
                        aria-controls="myOrder" aria-selected="false">@lang('front.my_order')</a>
                </li>
            </ul>
        </div>
        @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>@lang('front.success')!</strong> {{Session::get('success')}}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
        @endif
        <div class="alert alert-success alert-dismissible fade show" style="display:none" role="alert">
            <a class="close" onclick="$('.alert').hide()">×</a>
            <strong>@lang('front.success')!</strong> <span id="success_message"></span>.
        </div>
        <div class="alert alert-danger alert-dismissible fade show" style="display:none" role="alert">
            <a class="close" onclick="$('.alert').hide()">×</a>
            <strong>@lang('front.error')!</strong> <span id="error_message" dir="ltr"></span>.
        </div>
        <div class="row mt-2">
            <div class="col">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <form  id="update_profile" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <table class="table table-hover table-sm table-properties">

                                <div class="col text-center mt-3" style="margin-bottom: 6%;">
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type='file' name=image id="imageUpload" accept=".png, .jpg, .jpeg" />
                                            <label for="imageUpload"></label>
                                        </div>
                                        <div class="avatar-preview">
                                            @if(isset(Auth::guard('client')->user()->image))
                                            <div id="imagePreview" for="imageUpload" style="background-image: url('{{Auth::guard('client')->user()->image}}');">
                                            @else
                                            <div id="imagePreview" for="imageUpload" style="background-image: url('{{asset('front/img/profial_pic.jpg')}}');">
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <tr>
                                    <th>@lang('front.name')</th>
                                    <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        <input type="text" name="name" value="{{Auth::guard('client')->user()->name}}" placeholder="اجهزتى اجهزتى">
                                    </td>
                                </tr>

                                <tr>
                                    <th> @lang('front.email')</th>
                                    <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        <input type="email" name="email" value="{{Auth::guard('client')->user()->email}}" placeholder="info@aghzty.com">
                                    </td>
                                </tr>

                                <tr>
                                    <th>@lang('front.phone')</th>
                                    <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        <input type="phone" name="phone" value="{{Auth::guard('client')->user()->phone}}" placeholder="">
                                    </td>
                                </tr>

                                <tr>
                                    <th>@lang('front.telphone')</th>
                                    <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        <input type="phone" name="home_telphone" value="{{Auth::guard('client')->user()->home_telphone}}" placeholder="">
                                    </td>
                                </tr>


                            </table>
                            <label class="text-center" style="margin-top: 65px;">
                                <button class="btn btn-primary" >@lang('front.save')</button>
                            </label>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                        <div class="accordion" id="accordionExample">
                            @foreach (Auth::guard('client')->user()->cities as $key=>$item)
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0 text-right">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapse{{$key+1}}" aria-expanded="true"
                                            aria-controls="collapse{{$key+1}}">
                                            @lang('front.address') {{$key+1}}
                                        </button>

                                        <a type="button"  href="{{url('clients/address/'.$item->pivot->id.'/delete')}}" class="delete-address btn btn-labeled btn-danger">
                                            <span class="btn-label">
                                                <i class="far fa-trash-alt"></i>
                                            </span>
                                        </a>
                                    </h2>
                                </div>
                                <div id="collapse{{$key+1}}" class="collapse show" aria-labelledby="heading{{$key+1}}"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <form action="{{url('clients/updated_address/'.$item->pivot->id)}}" class="ajax_update_city" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="form_number" value="{{$key+1}}">
                                            <table class="table table-hover table-sm table-properties">
                                                <tr>
                                                    <th>@lang('front.governorate')</th>
                                                    <td
                                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                        {!! Form::select("governorate_id_".($key+1), $countrys->pluck('title_'.getCode(),'id'),$item->governorate->id, ['required','class' => 'form-control gover_update']) !!}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th>@lang('front.city')</th>
                                                    <td
                                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                        {!! Form::select("city_id_".($key+1), $citys->pluck('city_'.getCode(),'id'),$item->pivot->city_id , ['required' , 'class' => 'form-control update_city']) !!}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th>@lang('front.address')</th>
                                                    <td
                                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                        <textarea cols="20" name="address_{{$key+1}}" rows="3">{{$item->pivot->address}}</textarea>
                                                    </td>
                                                </tr>
                                            </table>
                                            <label class="text-center">
                                                <button class="btn btn-primary">@lang('front.save')</button>
                                            </label>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0 text-right">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseadd" aria-expanded="false"
                                            aria-controls="collapseadd">
                                            @lang('front.add_address')
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseadd" class="collapse" aria-labelledby="headingadd"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <form action="{{url('clients/add_address')}}" class="ajax_add_city" method="post">
                                            {{ csrf_field() }}
                                            <table class="table table-hover table-sm table-properties">
                                                <tr>
                                                    <th>@lang('front.governorate')</th>
                                                    <td
                                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                        {!! Form::select("governorate_id", $countrys->pluck('title_'.getCode(),'id'),null, ['required','class' => 'form-control' ,'id' => 'gover_add']) !!}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th>@lang('front.city')</th>
                                                    <td
                                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                        {!! Form::select("city_id", [],null, ['required' ,'id' => 'add_city' ,'class' => 'form-control']) !!}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th>@lang('front.address_info')</th>
                                                    <td
                                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                        <textarea cols="20" name="address" rows="3"></textarea>
                                                    </td>
                                                </tr>
                                            </table>
                                            <label class="text-center">
                                                <button class="btn btn-primary">@lang('front.save')</button>
                                            </label>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab"
                        style="margin: 65px auto;">
                        <form action="{{url('clients/updated_password')}}" id="update_password" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <table class="table table-hover table-sm table-properties">
                                <tr>
                                    <th>@lang('front.old_password') </th>
                                    <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        <input type="password" name="old_password" placeholder="" autocomplete="off">
                                    </td>
                                </tr>

                                <tr>
                                    <th>@lang('front.new_password')</th>
                                    <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        <input type="password" name="password" placeholder="" autocomplete="off">
                                    </td>
                                </tr>

                                <tr>
                                    <th>@lang('front.confirm_password')</th>
                                    <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        <input type="password" name="password_confirmation" placeholder="" autocomplete="off">
                                    </td>
                                </tr>
                            </table>
                            <label class="text-center" style="margin-top: 65px;">
                                <button class="btn btn-primary">@lang('front.save')</button>
                            </label>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="myOrder" role="tabpanel" aria-labelledby="myOrder-tab">
                        <div class="accordion" id="accordionExample">
                            @foreach (\Auth::guard('client')->user()->orders as $key=>$order)
                            <div class="card" style="width:100%">
                                <div class="card-header" id="headingThree">
                                    <h2 class="mb-0 text-right">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapse{{($key+1)}}" aria-expanded="true"
                                            aria-controls="collapse{{($key+1)}}">
                                            @lang('front.order') {{($key+1)}}
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapse{{($key+1)}}" class="collapse show" aria-labelledby="heading{{($key+1)}}"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        @foreach($order->products as $product)
                                        <table class="table table-sm table-properties tabel-width {{ar_en()}}">
                                            <tr>
                                                <th>@lang('front.product')</th>
                                                <td>{{product($product->product_id)->getTranslation('title',getCode())}}</td>
                                            </tr>

                                            <tr>
                                                <th>@lang('front.product_image')</th>
                                                <td><img src="{{product($product->product_id)->main_image}}" alt="موبيل"></td>
                                            </tr>

                                            <tr style="border-bottom: 1px solid #ddd">
                                                <th>@lang('front.price')</th>
                                                <td>{{$product->price}} <span style="float: right;">@lang('front.pound')</span></td>
                                            </tr>

                                            <tr>
                                                <th>@lang('front.quantity')</th>
                                                <td>{{$product->quantity}}</td>
                                            </tr>

                                            <tr style="border-bottom: 2px solid #000">
                                                <th>@lang('front.total_price')</th>
                                                <td> {{$product->total_price}}<span style="float: right;">@lang('front.pound')</span></td>
                                            </tr>



                                        </table>
                                        @endforeach
                                        <aside class="cart-aside" style="margin-bottom:8px">
                                            <div class="summary">
                                                <div class="summary-total-items"><span class="total-items"></span> @lang('front.order') {{($key+1)}}</div>
                                                <div class="summary-subtotal">
                                                    <div class="subtotal-title">@lang('front.total_price')</div>
                                                    <div class="subtotal-value final-value" id="basket-subtotal">{{$order->total_price - $order->shipping_amount}}</div>
                                                </div>
                                                <div class="summary-subtotal">
                                                    <div class="subtotal-title">@lang('front.shipping_amount')</div>
                                                    <div class="subtotal-value final-value" id="basket-subtotal">{{(int)$order->shipping_amount}}</div>
                                                </div>
                                                <div class="summary-subtotal">
                                                    <div class="subtotal-title"> @lang('front.total_price_after_shipping')</div>
                                                    <div class="subtotal-value final-value" id="basket-subtotal">{{$order->total_price}}</div>
                                                </div>
                                                <div class="summary-subtotal">
                                                    <div class="subtotal-title">@lang('front.address')</div>
                                                    <div class="final-value" id="basket-subtotal">{{$order->address->address}} , {{$order->address->city['city_'.getcode()]}}-{{$order->address->city->governorate['title_'.getcode()]}}</div>
                                                </div>
                                                <div class="summary-subtotal">
                                                    <div class="subtotal-title">@lang('front.status')</div>
                                                    <div class="final-value" id="basket-subtotal">{{$order->status}}</div>
                                                </div>
                                            </div>
                                        </aside>
                                    </div>
                                </div>

                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('script')
<script>
    function readURL(input)
    {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    //image change
    $("#imageUpload").change(function() {
        readURL(this);
    })
    $('#imagePreview').click(function(){
        $("#imageUpload").trigger('click')
    })
    //update profile data
    $('#update_profile').submit(function(e){
        e.preventDefault();
        $.ajax({
        url: "{{url('clients/updated')}}",
        type: "POST",
        data:  new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data){
            if(data.status == 'success'){
                $('.alert-success').show()
                //if(!$('.alert-danger').hasClass('d-none')){
                    $('.alert-danger').hide()
                //}
                $('#success_message').html(data.success)
                $('html, body').animate({
                    scrollTop: 0
                    }, 500);
            }
            else{
                console.log(data.error);

                $('.alert-danger').show()
                //if(!$('.alert-success').hasClass('d-none')){
                    $('.alert-success').hide()
                //}
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
    //update password
    $('#update_password').submit(function(e){
        e.preventDefault();
        $.ajax({
        url: "{{url('clients/updated_password')}}",
        type: "POST",
        data:  new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data){
            if(data.status == 'success'){
                $('.alert-success').show()
                //if(!$('.alert-danger').hasClass('d-none')){
                    $('.alert-danger').hide()
               // }
                $('#success_message').html(data.success)
                $('html, body').animate({
                    scrollTop: 0
                    }, 500);
            }
            else{
                console.log(data.error);

                $('.alert-danger').show()
                //if(!$('.alert-success').hasClass('d-none')){
                    $('.alert-success').hide()
               // }
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
    //trigger city from gover

    $(document).on('change','.gover_update',function(){
        console.log($(this).parent().parent().next('tr').children().last().children().last());
        var this_ = $(this)
        $.ajax({
        url: "{{url('clients/city')}}/"+$(this).val(),
        type: "get",
        success: function(data){
            this_.parent().parent().next('tr').children().last().children().last().empty();
           for (let i = 0; i < data.length; i++) {
            const element = '<option value="'+data[i].id+'">'+data[i].city+'</option>'
            this_.parent().parent().next('tr').children().last().children().last().append(element)
           }
        },
        });
    })
    $(document).on('change','#gover_add',function(){
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
    //update city
    $(document).on('submit','.ajax_update_city',function(e){
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
                $("#address").load(location.href+" #address>*","");
                //setTimeout(location.reload.bind(location), 2000);
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
    //add city
    $(document).on('submit','.ajax_add_city',function(e){
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
                $("#address").load(location.href+" #address>*","");
                //setTimeout(location.reload.bind(location), 2000);
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
		//delete addrees
	$(document).on('click','.delete-address',function(e){
      e.preventDefault();
        $.ajax({
        url: $(this).attr('href'),
        type: "get",
        success: function(data){
					if(data.status == 'success'){
							$('.alert-success').show()
							//if(!$('.alert-danger').hasClass('d-none')){
									$('.alert-danger').hide()
							//}
							$('#success_message').html(data.success)
							$('html, body').animate({
									scrollTop: 0
									}, 500);
									$("#address").load(location.href+" #address>*","");
					}
        },
        });
    });
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
