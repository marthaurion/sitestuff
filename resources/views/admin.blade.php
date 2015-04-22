<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Marth's Admin</title>
    <link rel="stylesheet" href="/css/admin.css">
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header"><a class="navbar-brand" href="/admin">Marth's Admin</a></div>
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">
            @yield('content')
        </div> <!-- end container -->
    </div>
</div>

<script src="/js/all.js"></script>
@yield('footer')


</body></html>
