<section class="profile_img text-center mb-4">
  <a class="upload_img" onclick="_upload()">
    @if (Auth::guard('client')->user())

      @if (Auth::guard('client')->user()->facebook)

        @if (strpos(Auth::guard('client')->user()->image, 'uploads') !== false)

        <img id='output' class="img-fluid rounded-circle" src="{{url(Auth::guard('client')->user() && Auth::guard('client')->user()->image  ? Auth::guard('client')->user()->image : 'public/frontv2/images/login.png')}}" alt="Profile Picture">

        @else

        <img id='output' class="img-fluid rounded-circle" src="{{Auth::guard('client')->user()->image}}" alt="Profile Picture">

        @endif

      @else

      <img id='output' class="img-fluid rounded-circle" src="{{url(Auth::guard('client')->user() && Auth::guard('client')->user()->image  ? Auth::guard('client')->user()->image : 'public/frontv2/images/login.png')}}" alt="Profile Picture">

      @endif

    @endif

    <i id="icon_upload" class="upload_icon_img fas fa-camera fa-3x"></i>
  </a>
  <input type="file" name="image" accept='image/*' id="file_upload_id" onchange="openFile(event)" style="display:none">
</section>
