@extends('front.master')
@section('title')
  Blackport || Home
@endsection

@section('content')
  @foreach($blogs as $blog)
  <div class="article">
          <h2><a href="">{{ $blog->blog_title }}</a></h2>
          <p class="infopost">Posted on <span class="date">11 sep 2018</span> by <a href="#">Admin</a> &nbsp;&nbsp;|&nbsp;&nbsp; Filed under <a href="#">templates</a>, <a href="#">internet</a> <a href="#" class="com">Comments <span>11</span></a></p>
          <div class="clr"></div>
          <div class="img"><img src="{{ asset($blog->blog_image) }}" width="177" height="213" alt="" class="fl" /></div>
          <div class="post_content">
            <p>{{ substr($blog->blog_description, 0, 500) }}</p>
            <p class="spec"><a href="#" class="rm">Read more &raquo;</a></p>
          </div>
          <div class="clr"></div>
        </div>
        @endforeach
        <!-- <p class="pages"><small>Page 1 of 2</small> <span>1</span> <a href="#">2</a> <a href="#">&raquo;</a></p> -->
        <p class="pages"><small>Page 1 of 2</small> {{ $blogs->links() }} <a href="#">&raquo;</a></p>
@endsection