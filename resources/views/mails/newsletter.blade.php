<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Aghezty</title>
</head>

<body style="text-align: center">

  <div style="background: #666">
    <img width="100px" class="d-block m-auto" src="{{ $message->embed('public/frontv2/images/logo/01.png') }}"
      alt="Logo">
  </div>

  <div>
    {!! $content !!}
  </div>

  <div style="background: #9d9d9d">
    <footer style="background: #9d9d9d; padding:5px">
      <address class="p-2">Aghezty.com {{date('Y')}} ©. All Rights Reserved.</address>
    </footer>
  </div>

</body>

</html>
