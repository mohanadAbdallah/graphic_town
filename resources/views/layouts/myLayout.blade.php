<!DOCTYPE html>

<html>
<head>
<title>Laravel Project</title>
</head>
<body>
    <div class="header"> This is header in layout </div>
    @yield('content')
    <div class="footer"> This is footer in layout </div>
    @yield('footer')
</body>
</html>
