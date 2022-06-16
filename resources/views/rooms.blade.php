@extends('layouts.app')
@section('content')
    <section class="banner_area">
        <div class="booking_table d_flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0"
                 data-background=""></div>
            {{--<div class="container">--}}
            {{--<div class="banner_content text-center">--}}
            {{--<h6>Away from monotonous life</h6>--}}
            {{--<h2>Relax Your Mind</h2>--}}
            {{--<p>If you are looking at blank cassettes on the web, you may be very confused at the<br> difference in price. You may see some for as low as $.17 each.</p>--}}
            {{--<a href="#" class="btn theme_btn button_hover">Get Started</a>--}}
            {{--</div>--}}
            {{--</div>--}}
            <div class="col-md-12 ">
                <div class="boking_table">
                    <div class="row justify-content-center" style=" margin-top: 350px" id="filters">
                        <div class="book_tabel_item">
                            <div class='input-group'>
                                <input type='text'   style=" width: 153px;height: 64px;left: 0px;top: 0px;background: #FFFBE9;border: 1px solid #4E4F2F; text-align:center;font-family: 'Playfair Display';font-style: normal;font-weight: 400;font-size: 24px;line-height: 32px;color: #000000;" class="form-control "  name="location" id="location" placeholder="AnyWhere"/>
                                <input type="hidden" name="city" id="city" class="form-control" readonly="readonly">
                            </div>
                        </div>
                        <div class="book_tabel_item">
                            <div class='input-group ' >
                                <input id="start_date" name="start_date" placeholder="Cheek in" type="text" style=" text-align:center; width: 190px;height: 64px;top: 0px;background: #FFFBE9;border: 1px solid #4E4F2F;font-family: 'Playfair Display';font-style: normal;font-weight: 400;font-size: 24px;line-height: 32px;color: #000000;" class="form-control dates ">
                                <input id="end_date"  name="end_date" type="text" placeholder="Cheek out" style=" text-align:center;  width: 190px;height: 64px;top: 0px; background: #FFFBE9;border: 1px solid #4E4F2F;font-family: 'Playfair Display';font-style: normal;font-weight: 400;font-size: 24px;line-height: 32px;color: #000000;"  class="form-control dates ">
                            </div>

                        </div>
                        <div class="book_tabel_item">
                            <div class="input-group ">
                                <select name="room_type" id="room_type" class=" form-control " style="width: 187px;height: 64px;top: 0px;background: #FFFBE9;border: 1px solid #4E4F2F;font-family: 'Playfair Display';font-style: normal;font-weight: 400;font-size: 24px;line-height: 32px;color: #000000;" >
                                    <option value="">Rooms</option>
                                    @foreach($room_types as $room_type => $room_general_image)
                                        <option value="{{$room_type}}">{{$room_type}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="book_tabel_item">
                            <div class="input-group">
                                <select class=" form-control " style="  width: 187px;height: 64px;top: 0px;background: #FFFBE9;border: 1px solid #4E4F2F;font-family: 'Playfair Display';font-style: normal;font-weight: 400;font-size: 24px;line-height: 32px;color: #000000;">
                                    <option data-display="Child">Adult</option>
                                    <option value="1">Old</option>
                                    <option value="2">Young</option>
                                </select>
                            </div>
                        </div>

                        <div class="book_tabel_item">
                            <button style=" text-align:center;  width: 271px;height: 64px;top: 0px;background: #4E4F2F;font-family: 'Playfair Display';font-style: normal;font-weight: 700;font-size: 20px;line-height: 32px;color: #FFFBE9;" class="book_now_btn button_hover cheek_room_now" >Cheek Room Now</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @foreach($hotels as $hotel)
        <div  id="hotel-{{$hotel->id}}" data-image="{{$hotel->image_path}}" data-min="{{$hotel->rooms_min_price}}" data-count=" {{$hotel->rooms_count}}">
            @endforeach
        </div>
    </section>
    <section class="accomodation_area section_gap rooms_search" style="background: #FFFEFB;">
        <div class="container" id="filter">
            <div class="section_title text-center">
                <h4 class="title_color hotels_list">Room list</h4>
                <div class="col-md-6 select_hotels">
                    <select name="hotel_id" id="hotel_id" class="form-control get_rooms_select_hotels" >
                        <optgroup label="Hotels">
                            <option value=""></option>
                            @foreach($hotels as $hotel)
                                <option value="{{$hotel->id}}">{{$hotel->name}}</option>
                            @endforeach
                        </optgroup>
                    </select>
                    <div class="book_tabel_item" style="margin-top: 25px">
                        <button style=" text-align:center;  width: 271px;height: 64px;top: 0px; margin-left:110px;background: #4E4F2F;font-family: 'Playfair Display';font-style: normal;font-weight: 700;font-size: 20px;line-height: 32px;color: #FFFBE9;" class="book_now_btn button_hover cheek_hotel_now" >Cheek Hotel </button>
                    </div>

                </div>

            </div>

            <div class="row mb_30 hotel_search">
                @foreach($hotels as $hotel)
                    @if($hotel->rooms->count()>0)
                        <div class="container">
                            <a href="{{asset(url('/hotel/'.$hotel->id))}}" style="color: #6D8B74">    <h5>{{$hotel->name}}</h5></a>
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
                @endforeach

            </div>
        </div>
    </section>

    <section class="facilities_area ">
        <div id="map-container-google-3" class="z-depth-1-half map-container-3">
        </div>
    </section><br>

@endsection