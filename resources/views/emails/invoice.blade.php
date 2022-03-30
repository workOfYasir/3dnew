<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="{{ asset('assets/images/logo/logo-favicon.png') }}" type="image/x-icon">
    <!-- <link rel="shortcut icon" href="{{ asset('assets/images/logo/logo-favicon.png') }}" type="image/x-icon"> -->
    <title>3D Organs</title>
</head>

<body>
  {{ $details['name'] }} عزيزي 
  <br>
  {{ $details['body1'] }}
  <br>
  {{ $details['body2'] }}
  <br>
  {{ $details['body3'] }}
  <br>
  <a href="#">{{ $details['linkText'] }}</a>
  <br>
  {{ $details['thanks'] }}
  <img src="{{ asset('assets/images/logo/logo-favicon.png') }}" alt=""><br>
</body>
</html>	