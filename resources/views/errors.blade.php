@if(count($errors)>0)
<div class="col-sm-12 alert alert-danger msg_danger_min bounce-in-bottom text-capitalize">
  <span class="closebtn" style="margin-left: 15px;color: black;font-weight: bold;float: right;font-size: 22px;cursor: pointer;transition: 0.3s;line-height: 20px;" onclick="this.parentElement.style.display='none';">&times;</span>
  <ul>
    @foreach($errors->all() as $error)
    <li>
      {{$error}}
    </li>
    @endforeach
  </ul>
</div>
@endif
