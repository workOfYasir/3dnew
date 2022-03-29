<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="{{ asset('assets/images/logo/logo-favicon.png') }}" type="image/x-icon">
    <!-- <link rel="shortcut icon" href="{{ asset('assets/images/logo/logo-favicon.png') }}" type="image/x-icon"> -->
    <title>3D Organs</title>
</head>

<body>
<h3>تم استلام طلب رقم :{{ $details['subject'] }} </h3><br>
<p>Body : </p>
  
عزيزي :<span>{{$details['name']}}</span><br>
تم استلام طلب رقم: <span>{{ $details['subject'] }}</span><br>
<span>وسيتم التواصل بكم قريباً</span><br>
<span>شكراً جزيلاً</span>
  <img src="{{ asset('assets/images/logo/logo-favicon.png') }}" alt=""><br>
</body>
</html>	