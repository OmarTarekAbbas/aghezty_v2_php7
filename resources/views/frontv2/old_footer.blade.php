<style>
  /*----------------------------------------- Start Old Footer -----------------------------------------*/

.footer_footer {
  &::before {
    content: "";
    display: block;
    height: 70px;
    background: linear-gradient(to top left, #383838 0%, #383838 calc(50% - 0.8px), #383838 50%, rgba(0, 0, 0, 0) calc(50% + 0.8px), rgba(0, 0, 0, 0) 100%);
  }

  .footer_content {
    .container-fluid {
      padding-left: 20px !important;
      padding-right: 20px !important;
    }

    background-color: #383838;
    color: #777;
    padding: 20px 0;
    font-size: 13px;

    .block {
      .block_title {
        font-size: 22px;
        color: $white_color;
      }

      .block_content {
        .ul_links {
          padding-left: 1.5rem;

          li {
            font-size: 12px;

            a {
              color: $white_color;
              line-height: 2;
              text-transform: capitalize;

              &:hover,
              &:focus {
                color: $greyTitle_color;
                text-decoration: underline !important;
              }
            }
          }

          strong {
            color: $white_color;
          }
        }

        .hotline {
          color: $white_color;
          font-size: 15px;

          a {
            color: $white_color;
            font-size: 20px;

            &:hover,
            &:focus {
              text-decoration: underline !important;
              color: $greyTitle_color;
            }
          }
        }
      }
    }

    .block_bottom {
      address {
        color: $white_color;
      }
    }
  }

  .rounded-social-buttons {
    .social-button {
      display: inline-block;
      position: relative;
      cursor: pointer;
      width: 3.125rem;
      height: 3.125rem;
      border: 0.125rem solid transparent;
      padding: 0;
      text-decoration: none;
      text-align: center;
      color: #fefefe;
      font-size: 1.5625rem;
      font-weight: normal;
      line-height: 3rem;
      border-radius: 1.6875rem;
      transition: all 0.5s ease;
      margin-right: 0.5rem;
      margin-bottom: 0.25rem;

      &:hover,
      &:focus {
        -webkit-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        transform: rotate(360deg);
      }

      &.facebook_link {
        background: #3b5998;

        &:hover,
        &:focus {
          color: #3b5998;
          background: #fefefe;
          border-color: #3b5998;
        }
      }

      &.whatsapp_link {
        background: #25D366;

        &:hover,
        &:focus {
          color: #25D366;
          background: #fefefe;
          border-color: #25D366;
        }
      }

      &.phone_link {
        background: #00AFF0;

        &:hover,
        &:focus {
          color: #00AFF0;
          background: #fefefe;
          border-color: #00AFF0;
        }
      }

      &.sms_link {
        background: #007bb5;

        &:hover,
        &:focus {
          color: #007bb5;
          background: #fefefe;
          border-color: #007bb5;
        }
      }

      &.mail_link {
        background: #ffa930;

        &:hover,
        &:focus {
          color: #ffa930;
          background: #fefefe;
          border-color: #ffa930;
        }
      }

      .facebook_icon,
      .whatsapp_icon,
      .phone_icon,
      .sms_icon,
      .mail_icon {
        font-size: 25px;
      }
    }
  }
}

/*----------------------------------------- End Old Footer -----------------------------------------*/
</style>



{{-- <footer class="footer_footer">
    <div class="footer_content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 col-xl-12 col-12">
            <div class="row">
              <div class="col-md-12 col-xl-6 col-12">
                <div class="block">
                  <div class="block_title mb-3">
                    <strong>@lang('front.shop_by_category')</strong>
                  </div>

                  <div class="block_content">
                    <div class="row">

                      @foreach (categoryInFooter() as $category)
                      @if($category->sub_cats->count() > 0)
                      <div class="col-md-3 col-xl-3 col-6 p-0 no_padding_mobile">
                        <ul class="list-unstyled ul_links">
                          <a href="{{url('clients/productsv2?random=random&category_id='.$category->id)}}">
                            <strong
                              class="font-weight-bold border-bottom">{{$category->getTranslation('title',getCode())}}</strong>
                          </a>
                          @php
                          $count = $category->sub_cats->count();
                          $limit = $count/2;
                          @endphp
                          @foreach ($category->sub_cats->slice(0, $limit) as $sub_category)
                          <li>
                            <a class="hvr-icon-forward" href="{{url('category/'.$sub_category->id.'/'.setSlug($sub_category->title))}}" title="Dish Washers">{{$sub_category->getTranslation('title',getCode())}}</a>
                          </li>
                          @endforeach
                        </ul>
                      </div>

                      <div class="col-md-3 col-xl-3 col-6 p-0 no_padding_mobile">
                        <ul class="list-unstyled ul_links">
                          <a href="{{url('category/'.$sub_category->id.'/'.setSlug($sub_category->title))}}">
                            <strong class="font-weight-bold border-bottom invisible">Heavy Machines</strong>
                          </a>

                          @foreach ($category->sub_cats->slice($limit, $count) as $sub_category)
                          <li>
                            <a class="hvr-icon-forward" href="{{url('category/'.$sub_category->id.'/'.setSlug($sub_category->title))}}" title="{{$sub_category->getTranslation('title',getCode())}}">{{$sub_category->getTranslation('title',getCode())}}</a>
                          </li>
                          @endforeach

                        </ul>
                      </div>
                      @endif
                      @endforeach

                    </div>
                  </div>
                </div>
              </div>

              @php
              $brands = brands();
              @endphp

              <!-- <div class="col-md-6 col-xl-3 col-12">
                <div class="block block_brand_content">
                  <div class="block_title mb-3">
                    <strong>@lang('front.shop_by_brand')</strong>
                  </div>

                  <div class="block_content">
                    <div class="row">
                      <div class="col-md-3 col-xl-4 col-6 p-0 no_padding_mobile">
                        <ul class="list-unstyled ul_links">
                          <a href="#0">
                            <strong class="font-weight-bold border-bottom">@lang('front.brands')</strong>
                          </a>
                          @php
                          $count = $brands->count();
                          $limit = $count/2;
                          @endphp
                          @foreach ($brands->slice(0, $limit) as $item)
                          <li>
                            <a class="hvr-icon-forward" href="{{url('clients/productsv2?brand_id='.$item->id)}}" title="{{$item->getTranslation('title',getCode())}}">{{$item->getTranslation('title',getCode())}}</a>
                          </li>
                          @endforeach
                        </ul>
                      </div>

                      <div class="col-md-3 col-xl-4 col-6 p-0 no_padding_mobile">
                        <ul class="list-unstyled ul_links">
                          <a href="#0">
                            <strong class="font-weight-bold border-bottom invisible">@lang('front.brands')</strong>
                          </a>
                          @foreach ($brands->slice($limit, $count) as $item)
                          <li>
                            <a class="hvr-icon-forward" href="{{url('clients/productsv2?brand_id='.$item->id)}}" title="{{$item->getTranslation('title',getCode())}}">{{$item->getTranslation('title',getCode())}}</a>
                          </li>
                          @endforeach
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->

              <div class="mobile_center col-md-6 col-xl-6 col-12">
                <div class="block">
                  <div class="block_content">
                    <div class="row">
                      <div class="col-xl-6 col-12">
                        <div class="block_title mb-2">
                          <strong>@lang('front.important_links')</strong>
                        </div>

                        <ul class="list-unstyled ul_links">
                          <li>
                            <a class="text-capitalize hvr-icon-forward" href="{{url('clients/contactv2')}}"
                              title="Contact Us">@lang('front.contact')</a>
                          </li>

                          <li>
                            <a class="text-capitalize hvr-icon-forward" href="{{url('clients/service_centerv2')}}"
                              title="Maintenance">@lang('front.service_center')</a>
                          </li>

                          <li>
                            <a class="text-capitalize hvr-icon-forward" href="{{url('clients/about_mev2')}}"
                              title="Maintenance">@lang('front.about_mev2')</a>
                          </li>
                          <li>
                            <a class="text-capitalize hvr-icon-forward" href="{{url('clients/terms_conv2')}}"
                              title="Maintenance">@lang('front.terms_conv2')</a>
                          </li>
                          <li>
                            <a class="text-capitalize hvr-icon-forward" href="{{url('clients/visa_terms')}}"
                              title="Maintenance">@lang('front.visa_terms')</a>
                          </li>
                          <li>
                            <a class="text-capitalize hvr-icon-forward" href="{{url('clients/productsv2?most_solid=most_solid')}}"
                              title="Most Solid">@lang('front.most_solid')</a>
                          </li>
                        </ul>
                      </div>

                      <div class="col-xl-6 col-12">
                        <div class="block_title mb-3">
                          <strong>@lang('front.find_us')</strong>
                        </div>

                        <div class="block_content">
                          <div class="row">
                            @if(setting('android_link') && setting('android_link')!= '')
                            <div class="col-xl-6 col-6 p-0">
                              <a class="app-icon" href="{{setting('android_link')}}" title="Google Play">
                                <img class="border border-white rounded hvr-icon-forward"
                                  src="{{url('public/frontv2/images/google-play.svg')}}" alt="Google Play">
                              </a>
                            </div>
                            @endif

                            @if(setting('ios_link') && setting('ios_link')!= '')
                            <div class="col-xl-6 col-6 p-0">
                              <a class="app-icon" href="{{setting('ios_link')}}" title="Google Play">
                                <img class="border border-white rounded hvr-icon-forward"
                                  src="{{url('public/frontv2/images/app-store.svg')}}" alt="App Store">
                              </a>
                            </div>
                            @endif

                            <div class="col-sm-12 col-lg-12 col-xl-12 p-0">
                              <div class="rounded-social-buttons text-center my-3">
                                @if(setting('facebook') && setting('facebook')!= '')
                                <a class="social-button facebook_link" title="Facebook" href="{{setting('facebook')}}"
                                  target="_blank">
                                  <i class="fab fa-facebook-f facebook_icon"></i>
                                </a>
                                @endif

                                @if(setting('phone') && setting('phone')!= '')
                                <a class="social-button whatsapp_link" title="Whatsapp"
                                  href="whatsapp://send?phone={{setting('phone')}}">
                                  <i class="fab fa-whatsapp whatsapp_icon"></i>
                                </a>
                                @endif

                                @if(setting('phone') && setting('phone')!= '')
                                <a class="social-button phone_link" title="Phone Number"
                                  href="tel:{{setting('phone')}}">
                                  <i class="fas fa-phone phone_icon"></i>
                                </a>
                                @endif

                                @if(setting('sms') && setting('sms')!= '')
                                <a class="social-button sms_link" title="Messege" href="sms:{{setting('sms')}}">
                                  <i class="far fa-comment sms_icon"></i>
                                </a>
                                @endif

                                @if(setting('mail') && setting('mail')!= '')
                                <a class="social-button mail_link" title="Email" href="{{setting('mail')}}">
                                  <i class="fas fa-envelope mail_icon"></i>
                                </a>
                                @endif
                              </div>
                            </div>

                            <div class="col-sm-12 col-lg-12 col-xl-12 p-0">
                              <div class="payment_methods text-center">
                                <img class="w-50" src="{{url('public/frontv2/images/payment-icons.png')}}" alt="Visa">
                              </div>
                            </div>

                            <div class="col-sm-12 col-xl-12 p-0">
                              <div class="hotline mt-2 text-center">
                                <strong>@lang('front.auth.phone')</strong>
                                <a class="d-block" href="tel:{{setting('phone')}}" title="Phone number">
                                  <strong>{{setting('phone')}}</strong>
                                </a>
                              </div>
                            </div>

                            <div class="col-sm-12 col-xl-12 p-0">
                              <div class="mt-2 text-center">
                                <div>@lang('front.newsletter')</div>
                                @if (session('success'))
                                <div class="alert alert-success">{{session('success')}}</div>
                                @elseif (session('fail'))
                                <div class="alert alert-danger">{{session('fail')}}</div>
                                @endif
                                <form class="m-2" action="{{url('newsletter/store')}}" method="POST">
                                  @csrf
                                    <div class="input-group">
                                      <input type="email" class="form-control" name="mail" placeholder="Enter your email" required>
                                      <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit">Subscribe</button>
                                      </span>
                                    </div>
                                  </form>
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12 col-xl-12">
              <div class="block_bottom">
                <div class="row">
                  <div class="col-sm-8 col-xl-12 text-right">
                    <address>Aghezty.com {{date('Y')}} ©. All Rights Reserved.</address>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

    
  </footer> --}}
