<div class="container">
    <h4 class="title_color"> {{count($rooms) <1 ? 'No such rooms were found during the inspection:' : 'Rooms'}} </h4>
</div>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="cards-wrapper">
                @foreach($rooms->slice(0, 3) as $room)
                    <div class="card">
                        <a href="{{asset(url('/booking/room/'.$room->id))}}">
                            <img src="{{asset($room->image_path)}}" class="card-img-top">
                        </a>
                        <div class="card-body">
                            <div class="center price_info">
                                <br>
                                <h5  style="color: white;">From ${{$room->price}} </h5>
                            </div>
                            <a href="{{asset(url('/booking/room/'.$room->id))}}" >
                                <h5 class="card-title room_title ">{{$room->type}}</h5></a>
                            <p class="card-text"><i class="fa fa-bed"></i> {{$room->bad}} Bad&ensp;&ensp;&ensp;&ensp;
                                <i class="fas fa-ruler-vertical"></i>
                                {{$room->room_size}} sqm &ensp;&ensp;&ensp;&ensp;
                                <i class="fa fa-shower" aria-hidden="true"></i>
                                {{$room->bathroom}} Bathroom
                            </p>
                            <a href="{{asset(url('/booking/room/'.$room->id))}}" ><button class="btn theme_btn  ">
                                    Book Now
                                </button></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @if($count>3)
        <div class="carousel-item">
            <div class="cards-wrapper">
                @foreach($rooms->slice(3, 3) as $room)
                    <div class="card">
                        <a href="{{asset(url('/booking/room/'.$room->id))}}">
                        <img src="{{asset($room->image_path)}}" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <div class="center price_info">
                                <br>
                                <h5  style="color: white;">From ${{$room->price}} </h5>
                            </div>
                            <a href="{{asset(url('/booking/room/'.$room->id))}}">
                                <h5 class="card-title room_title ">{{$room->type}}</h5></a>
                            <p class="card-text"><i class="fa fa-bed"></i> {{$room->bad}} Bad&ensp;&ensp;&ensp;&ensp; <i class="fas fa-ruler-vertical"></i>
                                {{$room->room_size}} sqm&ensp;&ensp;&ensp;&ensp;
                                <i class="fa fa-shower" aria-hidden="true"></i> {{$room->bathroom}} Bathroom </p>

                            <a href="{{asset(url('/booking/room/'.$room->id))}}" ><button class="btn theme_btn  ">
                                    Book Now
                                </button></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
@endif
        @if($count>6)
        <div class="carousel-item">
            <div class="cards-wrapper">
                @foreach($rooms->slice(6, 3) as $room)
                    <div class="card">
                        <a href="{{asset(url('/booking/room/'.$room->id))}}">
                        <img src="{{asset($room->image_path)}}" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <div class="center price_info">
                                <br>
                                <h5  style="color: white;">From ${{$room->price}} </h5>
                            </div>
                            <a href="{{asset(url('/booking/room/'.$room->id))}}">
                            <h5 class="card-title room_title ">{{$room->type}}</h5>
                            </a>
                            <p class="card-text"><i class="fa fa-bed"></i> {{$room->bad}} Bad&ensp;&ensp;&ensp;&ensp; <i class="fas fa-ruler-vertical"></i>
                                {{$room->room_size}} sqm&ensp;&ensp;&ensp;&ensp;
                                <i class="fa fa-shower" aria-hidden="true"></i> {{$room->bathroom}} Bathroom </p>

                            <a href="{{asset(url('/booking/room/'.$room->id))}}" ><button class="btn theme_btn  ">
                                    Book Now
                                </button></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif
        @if($count>9)
        <div class="carousel-item">
            <div class="cards-wrapper">
                @foreach($rooms->slice(9, 3) as $room)
                    <div class="card">
                        <a href="{{asset(url('/booking/room/'.$room->id))}}">
                        <img src="{{asset($room->image_path)}}" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <div class="center price_info">
                                <br>
                                <h5  style="color: white;">From ${{$room->price}} </h5>
                            </div>
                            <a href="{{asset(url('/booking/room/'.$room->id))}}">
                            <h5 class="card-title room_title ">{{$room->type}}</h5>
                            </a>
                            <p class="card-text"><i class="fa fa-bed"></i> {{$room->bad}} Bad&ensp;&ensp;&ensp;&ensp; <i class="fas fa-ruler-vertical"></i>
                                {{$room->room_size}} sqm&ensp;&ensp;&ensp;&ensp;
                                <i class="fa fa-shower" aria-hidden="true"></i> {{$room->bathroom}} Bathroom </p>

                            <a href="{{asset(url('/booking/room/'.$room->id))}}" ><button class="btn theme_btn  ">
                                    Book Now
                                </button></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif
        @if($count>12)
        <div class="carousel-item">
            <div class="cards-wrapper">
                @foreach($rooms->slice(12, 3) as $room)
                    <div class="card">
                        <a href="{{asset(url('/booking/room/'.$room->id))}}">
                        <img src="{{asset($room->image_path)}}" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <div class="center price_info">
                                <br>
                                <h5  style="color: white;">From ${{$room->price}} </h5>
                            </div>
                            <a href="{{asset(url('/booking/room/'.$room->id))}}">
                            <h5 class="card-title room_title ">{{$room->type}}</h5>
                            </a>
                            <p class="card-text"><i class="fa fa-bed"></i> {{$room->bad}} Bad&ensp;&ensp;&ensp;&ensp; <i class="fas fa-ruler-vertical"></i>
                                {{$room->room_size}} sqm&ensp;&ensp;&ensp;&ensp;
                                <i class="fa fa-shower" aria-hidden="true"></i> {{$room->bathroom}} Bathroom </p>

                            <a href="{{asset(url('/booking/room/'.$room->id))}}" ><button class="btn theme_btn  ">
                                    Book Now
                                </button></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
    @foreach($rooms as $room)
        @if($count>3)
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        @endif
    @endforeach
</div>
