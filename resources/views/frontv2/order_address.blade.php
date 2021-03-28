@extends('frontv2.master')
@section('content')

<div class="main mt-2">
  <section class="my_profile">
    <div class="mobile_views">
      <div class="my_profile_bg rounded">
        <div class="row m-0">
          <div class="col-md-12 col-lg-12 col-xl-12 col-12">
            <div class="my_profile_title text-center my-3">
              <h5 class="text-capitalize text-white m-auto w-25 border-bottom border-secondary">@lang('front.my_address')</h5>
            </div>
          </div>
          @if(Session::has('success'))

          <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0 mt-3 alert alert-success alert-dismissible msg_success_min bounce-in-bottom text-capitalize fade show" role="alert">
            {{Session::get('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          @endif
          @if(Session::has('fail'))
          <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0 mt-3 alert alert-danger alert-dismissible msg_danger_min bounce-in-bottom text-capitalize fade show" role="alert">
            {{Session::get('fail')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
          @include('errors')
          <div class="col-md-12 col-lg-12 col-xl-12 col-12 no_padding_mobile">
            <div class="address_accordion w-100 my-2">
              <div class="accordion_add" id="accordionExample">
                @foreach (Auth::guard('client')->user()->cities as $key=>$item)
                <!-- Start My Address 1 -->
                <div class="card z-depth-0 bordered">
                  <div class="card-header" id="headingOne">
                    <h5 class="mb-0 d-flex">
                      <button class="btn btn-link text-center w-100 checked_add" data-value="{{$key+1}}"  type="button" data-toggle="collapse" data-target="#collapse{{$key+1}}" aria-expanded="true" aria-controls="collapseOne">
                         @lang('front.choose_address') <!-- {{$key+1}} -->
                      </button>
                    </h5>

                    <div class="checkbox_select_address">
                      <input  type="checkbox" name="" {{$key < 1 ? 'checked' : ''}} id="id-{{$key+1}}" disabled="disabled" checked="checked" />
                      <label for="id-{{$key+1}}">
                    </div>
                  </div>

                  <div id="collapse{{$key+1}}" class="collapse {{$key < 1 ? 'show' : ''}}" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <form action="{{route('front.home.address.update',['id' => $item->pivot->id])}}" method="post">
                      @csrf
                      <div class="card-body">
                        <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0 mb-4">
                          <div class="input-group mb-2 m-auto w-75 hvr-float">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><i class="fas fa-map-marker-alt"></i></div>
                            </div>
                            {!! Form::select("governorate_id", $countrys->pluck('title_'.getCode(),'id'),$item->governorate->id, ['required','class' => 'form-control gover_update' , 'id'=>'governorate_id_value']) !!}
                          </div>
                        </div>

                        <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0 mb-4">
                          <div class="input-group mb-2 m-auto w-75    ">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><i class="fas fa-map-marker-alt"></i></div>
                            </div>
                            {!! Form::select("city_id", $citys->pluck('city_'.getCode(),'id'),$item->pivot->city_id , ['required' , 'class' => 'form-control update_city' , 'id'=>'city_id_value']) !!}
                          </div>
                        </div>

                        <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0 mb-4">
                          <div class="input-group mb-2 w-75 m-auto hvr-float">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><i class="fas fa-keyboard"></i></div>
                              <textarea class="p-3 w-100" placeholder="@lang('front.my_address') {{$key+1}}" cols="150" rows="2" name="address" id="address_value">{{$item->pivot->address}}</textarea>
                            </div>
                          </div>
                        </div>



                        @if (Auth::guard('client')->user()->phone == "")

                        <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0 mb-4">
                          <div class="input-group mb-2 w-75 m-auto hvr-float">
                            <div class="input-group-prepend w-100">
                              <div class="input-group-text"><i class="fas fa-phone"></i></div>
                              <input id="phone" class="form-control w-100" placeholder=" @lang('front.phone_number_field') " name="phone" required>
                            </div>
                          </div>
                        </div>


                        <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0">

                          <button id="checkphone" type="button"   onclick="saveOrderAndPone(event)"     class="btn_save btn btn-secondary text-white mb-2 m-auto d-block w-75 text-capitalize hvr-wobble-to-bottom-right">@lang('front.continue')</button>

                          </div>

                          @else
                          <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0">
                            <button id="checkphone" type="button"     onclick="saveOrder(event)"   class="btn_save btn btn-secondary text-white mb-2 m-auto d-block w-75 text-capitalize hvr-wobble-to-bottom-right">@lang('front.continue')</button>
                            </div>

                        @endif


                      </div>
                    </form>
                  </div>
                </div>
                <!-- End My Address 1 -->
                @endforeach

                @if(count(Auth::guard('client')->user()->cities)==0)
                  <!-- Start Add New Address -->
                  <div class="card z-depth-0 bordered">
                    <div class="card-header" id="headingThree">
                      <h5 class="mb-0 d-flex">
                        <button class="btn btn-link collapsed text-center w-100" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          @lang('front.add_address')
                        </button>

                        <a class="add_new_address" href="#0"  data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          <i class="fas fa-plus"></i>
                        </a>
                      </h5>
                    </div>

                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                      <form action="{{route('front.home.address.add')}}" method="post">
                        @csrf
                        <div class="card-body">
                          <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0 mb-4">
                            <div class="input-group mb-2 m-auto w-75 hvr-float">
                              <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-map-marker-alt"></i></div>
                              </div>
                              {!! Form::select("governorate_id", $countrys->pluck('title_'.getCode(),'id'),null, ['required','class' => 'form-control' ,'id' => 'gover_add']) !!}
                            </div>
                          </div>

                          <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0 mb-4">
                            <div class="input-group mb-2 m-auto w-75 hvr-float">
                              <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-map-marker-alt"></i></div>
                              </div>
                              {!! Form::select("city_id", $citys->pluck('city_'.getCode(),'id'),null , ['required' , 'class' => 'form-control' ,'id' => 'add_city']) !!}
                            </div>
                          </div>

                          <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0 mb-4">
                            <div class="input-group mb-2 w-75 m-auto hvr-float">
                              <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-keyboard"></i></div>
                                <textarea class="p-3 w-100" placeholder="@lang('front.my_address')" cols="150" rows="2" name="address"></textarea>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0">
                            <button type="submit" class="btn_save btn btn-secondary text-white mb-2 m-auto d-block w-75 text-capitalize hvr-wobble-to-bottom-right">@lang('front.continue')</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!-- End Add New Address -->
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection
@section('script')
<script>
  $('#gover_add').change(function() {
    $.ajax({
      url: "{{url('clients/city')}}/" + $(this).val(),
      type: "get",
      success: function(data) {
        $('#add_city').empty();
        for (let i = 0; i < data.length; i++) {
          const element = '<option value="' + data[i].id + '">' + data[i].city + '</option>'
          $('#add_city').append(element)
        }
      },
    });
  })

  $('.gover_update').change(function() {
    // console.log($(this));
    // console.log($(this).parent().parent().siblings().children().first().children('.update_city'));
    var _this = $(this)
    $.ajax({
      url: "{{url('clients/city')}}/" + $(this).val(),
      type: "get",
      success: function(data) {
        _this.parent().parent().siblings().children().first().children('.update_city').empty();
        for (let i = 0; i < data.length; i++) {
          const element = '<option value="' + data[i].id + '">' + data[i].city + '</option>'
          _this.parent().parent().siblings().children().first().children('.update_city').append(element)
        }
      },
    });
  })
  $(document).ready(function() {
    var user_city = "{{$item->pivot->city_id}}";

    $.ajax({
      url: "{{url('clients/city')}}/" + $('.gover_update').val(),
      type: "get",
      success: function(data) {
        $('#city_id_value').empty();
        for (let i = 0; i < data.length; i++) {
          var selected_var = user_city==data[i].id ? "selected" : "";
          const element = '<option value="' + data[i].id + '" '+selected_var+' >' + data[i].city + '</option>'
          $('#city_id_value').append(element)
        }
      },
    });
  });

  $('.checked_add').click(function(){
    var value = $(this).data('value')
    $('[type=checkbox]').each(function(){
      if($(this).prop('id')  == 'id-'+value){
        $(this).prop('checked',!$(this).prop('checked'))
      }
      else{
        $(this).prop('checked',false)
      }
    })
  })


function  saveOrderAndPone(e){
  e.preventDefault();
   var phone =  $('#phone').val()

  if($('#phone').val() != ''){

    $.ajax({
      type: "post",
      url: "{{url('clients/phoneStoreAjax')}}",
      data: {phone : $('#phone').val()},
      success: function (response) {
        console.log(response);
      }
    });

    @if(isset( $item->pivot->city_id))
    location.href='{{route('front.home.confirm',['id' => $item->pivot->city_id])}}'
    @endif
  }else{
    alert(' @lang('front.phone_alert_message') ')
  }

}

function saveOrder(e){
  e.preventDefault();

  //get form values
  var governorate_id =  $('#governorate_id_value').val();
  var city_id =  $('#city_id_value').val();
  var address =  $('#address_value').val();

  if((governorate_id != '') && (city_id != '') && (address!='')){
    @if(isset($item->pivot->id) && $item->pivot->id!=null)
      $.ajax({
        type: "post",
        url: '{{route('front.home.address.update.ajax',['id' => $item->pivot->id])}}',
        data: {governorate_id: governorate_id, city_id: city_id, address: address},
        success: function (response) {


          console.log(response);
          console.log({{$item->pivot->city_id}});
          var url = "{{route('front.home.confirm', '')}}"+"/"+response;

          location.href= url;
        }
      });
    @endif

  }else{
    alert(' @lang('front.address_alert_message') ')
  }
}

</script>


 {{-- <script>
  $('#phone').change(function (e) {
    e.preventDefault();
    $.ajax({
      type: "post",
      url: "{{url('clients/phoneStoreAjax')}}",
      data: {phone : $('#phone').val()},
      success: function (response) {
        console.log(response);
      }
    });
  });

</script> --}}




@endsection
