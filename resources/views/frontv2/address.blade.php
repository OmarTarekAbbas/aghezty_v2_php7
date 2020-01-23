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
                      <button class="btn btn-link text-center w-100" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        @lang('front.my_address') {{$key+1}}
                      </button>

                      <a type="button" href="{{url('clients/addressv2/'.$item->pivot->id.'/delete')}}" class="btn btn-labeled btn-danger">
                        <span class="btn-label">
                          <i class="fas fa-times"></i>
                        </span>
                      </a>
                    </h5>
                  </div>

                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <form action="{{route('front.home.address.update',['id' => $item->pivot->id])}}" method="post">
                      @csrf
                      <div class="card-body">
                        <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0 mb-4">
                          <div class="input-group mb-2 m-auto w-75 hvr-float">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><i class="fas fa-map-marker-alt"></i></div>
                            </div>
                            {!! Form::select("governorate_id", $countrys->pluck('title_'.getCode(),'id'),$item->governorate->id, ['required','class' => 'form-control gover_update']) !!}
                          </div>
                        </div>

                        <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0 mb-4">
                          <div class="input-group mb-2 m-auto w-75    ">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><i class="fas fa-map-marker-alt"></i></div>
                            </div>
                            {!! Form::select("city_id", $citys->pluck('city_'.getCode(),'id'),$item->pivot->city_id , ['required' , 'class' => 'form-control update_city']) !!}
                          </div>
                        </div>

                        <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0 mb-4">
                          <div class="input-group mb-2 w-75 m-auto hvr-float">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><i class="fas fa-keyboard"></i></div>
                              <textarea class="p-3 w-100" placeholder="@lang('front.my_address') {{$key+1}}" cols="150" rows="2" name="address">{{$item->pivot->address}}</textarea>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0">
                          <button type="submit" class="btn_save btn btn-secondary text-white mb-2 m-auto d-block w-75 text-capitalize hvr-wobble-to-bottom-right">@lang('front.send')</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- End My Address 1 -->
                @endforeach
                <!-- Start Add New Address -->
                <div class="card z-depth-0 bordered">
                  <div class="card-header" id="headingThree">
                    <h5 class="mb-0 d-flex">
                      <button class="btn btn-link collapsed text-center w-100" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        @lang('front.add_address')
                      </button>
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
                          <button type="submit" class="btn_save btn btn-secondary text-white mb-2 m-auto d-block w-75 text-capitalize hvr-wobble-to-bottom-right">@lang('front.send')</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- End Add New Address -->
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
    $.ajax({
      url: "{{url('clients/city')}}/" + $('#gover_add').val(),
      type: "get",
      success: function(data) {
        $('#add_city').empty();
        for (let i = 0; i < data.length; i++) {
          const element = '<option value="' + data[i].id + '">' + data[i].city + '</option>'
          $('#add_city').append(element)
        }
      },
    });
  });
</script>
@endsection
