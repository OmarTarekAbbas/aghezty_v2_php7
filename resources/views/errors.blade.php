@if(count($errors)>0)
    <div class="col-sm-12 alert alert-danger" style="text-align : {{Session::get('applocale') == 'ar' ? 'right' : 'left' }}">
        <ul>
            @foreach($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>
    </div>
@endif
