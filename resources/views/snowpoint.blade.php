<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Snowpoint Temple Beta</title>
    <link rel="stylesheet" href="/css/all.css">
</head>

<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header"><a class="navbar-brand" href="/snowpoint">Snowpoint Temple Beta</a></div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('snowpoint') ? 'active' : '' }}"><a href="/snowpoint">Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">League Shit <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/league/rules">Rules</a></li>
                        <li><a href="/league/register">Registration</a></li>
                        <li><a href="/league/progress">Progress</a></li>
                    </ul>
                </li>
                <li class="{{ Request::is('snowpoint/chat') ? 'active' : '' }}"><a href="/snowpoint/chat">Chat</a></li>
                <li class="{{ Request::is('snowpoint/contact') ? 'active' : '' }}"><a href="/snowpoint/contact">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

<body>
<div id="everything" class="container">
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
            <div class="sidebar-module">
                <h4>Sidebar testing</h4>
                <p>Don't mind me.</p>
            </div>
            <div class="sidebar-module">
                <h4>Meta</h4>
                <ul>
                    @if(Auth::guest())
                        <li><a href="{{ url('/auth/login')}}">Login</a></li>
                        <li><a href="{{ url('/auth/register') }}">Register</a></li>
                    @else
                        <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                    @endif
                </ul>
            </div>
        </div> <!-- end #sidebar -->

    </div> <!-- end #row -->
    <hr />
    <footer>&copy; Snowpoint Test Page | Powered by Marth's Free Time</footer> <!-- end #footer -->
</div> <!-- end #everything -->

<script src="/js/all.js"></script>
@yield('footer')


</body></html>

