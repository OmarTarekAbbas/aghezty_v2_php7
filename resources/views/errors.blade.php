@if(count($errors)>0)
<div class="col-sm-12 alert alert-danger msg_danger_min bounce-in-bottom text-capitalize">
  <ul>
    @foreach($errors->all() as $error)
    <li>
      {{$error}}
    </li>
    @endforeach
  </ul>
</div>
@endif
