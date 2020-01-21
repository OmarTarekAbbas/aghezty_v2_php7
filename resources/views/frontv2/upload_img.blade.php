<section class="profile_img text-center mb-4">
  <a class="upload_img" href="#0" onclick="_upload()">
    <img id='output' class="img-fluid rounded-circle" src="{{url('public/frontv2/images/login.png')}}" alt="Profile Picture">

    <i id="icon_upload" class="upload_icon_img fas fa-camera fa-3x"></i>
  </a>
  <input type="file" name="image" accept='image/*' id="file_upload_id" onchange="openFile(event)" style="display:none">
</section>
