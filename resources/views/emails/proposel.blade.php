<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="{{ asset('assets/images/logo/logo-favicon.png') }}" type="image/x-icon">
    <!-- <link rel="shortcut icon" href="{{ asset('assets/images/logo/logo-favicon.png') }}" type="image/x-icon"> -->
    <title>3D Organs</title>
</head>

<body>
<h3>جاري تنفيذ طلب رقم  :{{ $details['subject'] }} </h3><br>
<p>Body : </p>
  
عزيزي :<span>{{$details['name']}}</span><br>
<span>جاري العمل على طلبكم رقم :{{ $details['subject'] }}</span><br>
<span>شكراً جزيلاً</span>
  <img src="{{ asset('assets/images/logo/logo-favicon.png') }}" alt=""><br>
</body>
</html>	