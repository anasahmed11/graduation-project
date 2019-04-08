@extends('layouts.myapp')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="blog-nav">
                    @foreach($blogs as $blog)
                        <button class="btn btn-block  blog-ajx
                            @if($blog->id%4 === 0&&$blog->id%2 === 0)
                                {{"btn-4"}}
                            @elseif($blog->id%2 === 0)
                                {{"btn-2"}}
                             @elseif($blog->id%3 === 0)
                                 {{"btn-3"}}
                            @elseif($blog->id === 7)
                                {{"btn-3"}}
                            @else
                                {{"btn-1"}}
                            @endif
                         " data-title="{{ $blog->title }}" data-article="{{ $blog->article }}" data-photo="{{ $blog->photo }}">{{ $blog->title }}</button><br>
                    @endforeach
                </div>
            </div>
            <div class="col-md-7 offset-1 wow fadeInDown"data-wow-duration="2s" data-wow-offset="300">
                <div class="blog">
                <div class="home-img img-ajx">
                    <img src="{{url('/uploads/1554503255.jpeg')}}"  width="100%" class="img-responsive" alt="html5 bootstrap template">
                </div>
                <div class="h-desc desc desc-ajx wow fadeInUp"data-wow-duration="2s" data-wow-offset="300">
                    <h2>click on any button</h2><br>
                    <p>
                        # it is very important to read this topics to gather primary information about what you suffer from<br><br>
                        # select any field to read some of articles about the field you choose<br><br>
                        # we provide some of topics written by experts in psychology , this topics help you to know what do you need from your doctor
                        <br><br>

                    </p>
                </div>
                </div>
            </div>
        </div>
    </div>

@endsection
