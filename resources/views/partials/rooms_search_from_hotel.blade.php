<div class="container" id="filter">
    <div class="section_title text-center">
        <h4 class="title_color hotels_list">Room list</h4>
        <div class="col-md-6 select_hotels">
            <select name="hotel" id="hotels" class="form-control get_rooms_select_hotels" >
                <optgroup label="Hotels">
                    <option value=""></option>
                    @foreach($all_hotels as $hotel_select)
                        <option value="{{$hotel_select->id}}">{{$hotel_select->name}}</option>
                    @endforeach
                </optgroup>
            </select>
            <div class="book_tabel_item" style="margin-top: 25px">
                <button style=" text-align:center;  width: 271px;height: 64px;top: 0px; margin-left:110px;background: #4E4F2F;font-family: 'Playfair Display';font-style: normal;font-weight: 700;font-size: 20px;line-height: 32px;color: #FFFBE9;" class="book_now_btn button_hover cheek_hotel_now" >Cheek Hotel </button>
            </div>
        </div>
    </div>
    <div class="row mb_30 hotel_search">
            @if($hotel->rooms->count()>0)
                <div class="container">
                    <a href="{{asset(url('/hotel/'.$hotel->id))}}" style="color:#6D8B74;">   <h5>{{$hotel->name}}</h5></a>
                </div>
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="cards-wrapper">
                                @foreach($hotel->rooms->slice(0, 3) as $room)
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
                        @if($hotel->rooms->count()>3)
                            <div class="carousel-item">
                                <div class="cards-wrapper">
                                    @foreach($hotel->rooms->slice(3, 3) as $room)
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
                        @if($hotel->rooms->count()>6)
                            <div class="carousel-item">
                                <div class="cards-wrapper">
                                    @foreach($hotel->rooms->slice(6, 3) as $room)
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
                        @if($hotel->rooms->count()>9)
                            <div class="carousel-item">
                                <div class="cards-wrapper">
                                    @foreach($hotel->rooms->slice(9, 3) as $room)
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
                        @if($hotel->rooms->count()>12)
                            <div class="carousel-item">
                                <div class="cards-wrapper">
                                    @foreach($hotel->rooms->slice(12, 3) as $room)
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
                        @if($hotel->rooms->count()>15)
                            <div class="carousel-item">
                                <div class="cards-wrapper">
                                    @foreach($hotel->rooms->slice(15, 3) as $room)
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
                    </div>

                    @if($hotel->rooms->count()>3)
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true" ></span>
                            <span class="sr-only">Next</span>
                        </a>
                    @endif

                </div>
            @endif

    </div>
</div>