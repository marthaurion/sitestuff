@extends('snowpoint')

@section('content')
    <h1>Chatroom and Streams</h1>
    <iframe src="http://www.twitch.tv/marthaurion/embed" frameborder="0" scrolling="no" height="378" width="620"></iframe>
    <a href="http://www.twitch.tv/marthaurion?tt_medium=live_embed&tt_content=text_link"
       style="padding:2px 0px 4px; display:block; width:345px; font-weight:normal;
       font-size:10px;text-decoration:underline;">Watch live video from Marthaurion on www.twitch.tv</a>

    <h2>Insert Chat Here</h2>
    <iframe src="http://www.twitch.tv/marthaurion/chat?popout=" frameborder="0" scrolling="no" height="500" width="350"></iframe>
@stop
