@extends('layouts.app')

@section('content')

 <!-- Breadcrumb Begin -->
 <div class="breadcrumb-option" style="background-color:#0b0c2a;margin-top:-30px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('home')}}"><i class="fa fa-home"></i> Home</a>
                        <a href="./categories.html">Categories</a>
                        <span>{{$anime->genere}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Anime Section Begin -->
    <section class="anime-details spad" style="background-color:#0b0c2a">
        <div class="container">
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="anime__details__pic set-bg" data-setbg="{{ asset('assets/img/'.$anime->image.'') }}">
                            <div class="comment"><i class="fa fa-comments"></i> {{$numberComments}}</div>
                            <div class="view"><i class="fa fa-eye"></i>{{$numberViwes}}</div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3>{{$anime->name}}</h3>
                            </div>
                           
                            <p>{{ $anime->description}}</p>
                            <div class="anime__details__widget">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Type:</span> {{$anime->type}}</li>
                                            <li><span>Studios:</span> {{$anime->studios}}</li>
                                            <li><span>Date aired:</span> {{$anime->date_aired}}</li>
                                            <li><span>Status:</span>{{$anime->status}}</li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Genre:</span>{{$anime->genere}}</li>

                                            <li><span>Duration:</span>{{$anime->duration}}</li>
                                            <li><span>Quality:</span>{{$anime->quality}}</li>
                                            <li><span>Views:</span>{{$numberViwes}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="anime__details__btn">
                                <a href="#" class="follow-btn"><i class="fa fa-heart-o"></i> Follow</a>
                                <a href="anime-watching.html" class="watch-btn"><span>Watch Now</span> <i
                                    class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="anime__details__review">
                            <div class="section-title">
                                <h5>Reviews</h5>
                            </div>
                            @foreach($comments as $cmt)
                                <div class="anime__review__item">
                                    <div class="anime__review__item__pic">
                                        <img src="{{asset('assets/img/'.$cmt->image.'')}}" alt="">
                                    </div>
                                    <div class="anime__review__item__text">
                                        <h6>{{$cmt->user_name}}<span> - {{$cmt->updated_at}}</span></h6>
                                        <p>{{$cmt->comment}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="anime__details__form">
                            <div class="section-title">
                                <h5>Your Comment</h5>
                            </div>
                            <form method="POST" action="{{route('insertComment', $anime->id)}}" >
                                @csrf
                                    <textarea name="comment" placeholder="Your Comment"></textarea>
                                    <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="anime__details__sidebar">
                            <div class="section-title">
                                <h5>you might like...</h5>
                            </div>
                            @foreach($randomanime as $rananime)
                                <div class="product__sidebar__view__item set-bg" data-setbg="{{ asset('assets/img/'.$rananime->image.'')}}">
                                    <div class="ep">{{$rananime->duration}}</div>
                                    <!-- <div class="view"><i class="fa fa-eye"></i> 9141</div> -->
                                    <h5><a href="{{route('anime-deatils',$rananime->id)}}">{{$rananime->name}}</a></h5>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Anime Section End -->


@endsection