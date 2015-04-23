<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Marth's Totally Legit Test Site</title>

<link rel="stylesheet" href="/css/darkly.css">

</head>

<body>
<div id="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header"><a class="navbar-brand" href="/">Marth's Totally Legit Test Site</a></div>

            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/">Home</a></li>
                    <li class="{{ Request::is('about') ? 'active' : '' }}"><a href="/about">About</a></li>
                    <li class="{{ Request::is('contact') ? 'active' : '' }}"><a href="/contact">Contact</a></li>
                    @if(!empty(Auth::user()) && Auth::user()->isSuper())
                        <li><a href="/articles/create">Create</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div id="page-wrapper">
        <div class="container">
            @if(Session::has('flash_message'))
                <div class="alert alert-success {{ Session::has('flash_message_important') ? 'alert-important' : '' }}">
                    @if(Session::has('flash_message_important'))
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    @endif

                    {{ session('flash_message') }}
                </div>
            @endif

            <div class="row">
            <div id="content" class="col-sm-8">
                @yield('content')
            </div> <!-- end #content -->

            <div id="sidebar" class="col-sm-3 col-sm-offset-1">
                @include('partials._sidebar')
            </div> <!-- end #sidebar -->

            </div> <!-- end #row -->
            <hr />
            <footer>&copy; Marth's Test Page | Powered by Marth's Free Time</footer> <!-- end #footer -->
        </div>
    </div> <!-- end #page-wrapper -->
</div> <!-- end #wrapper -->

<script src="/js/all.js"></script>
@yield('footer')


</body></html>

