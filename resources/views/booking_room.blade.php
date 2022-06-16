@extends('layouts.app')
@section('content')
    <section class="banner_area">
        <div class="room_booking_table d_flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0"
                 data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    {{--<h6>Away from monotonous life</h6>--}}
                    <h2 class="room_page_title">{{$room->type}} Room</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="accomodation_area section_gap ">
        <h4 class="title_color" style="text-align: center">{{$hotel->name}} </h4>
        <div class="">
            <div class="row ">
                <div class="col-md-9">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" style="margin-left: 25px;">
                            <div class="carousel-item active">
                                <img class="card-img-top" style="width: 924px;height: 540px;" src="{{asset($room->image_path)}}" alt="">
                            </div>
                            @foreach($room_images->slice(1) as $room_image)
                                <div class="carousel-item" >
                                    <img class="card-img-top" style="width: 924px; height: 540px;"  src="{{asset($room_image->path)}}" alt="">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev"  style="top: 111px" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true" style="margin-right: 100px;"></span>
                            <span class="sr-only" style="margin-right: 100px;">Previous</span>
                        </a>
                        <a class="carousel-control-next" style="top: 111px" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true" style="margin-left: 100px;"></span>
                            <span class="sr-only" style="margin-left: 100px;" >Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="elem-group" style=" text-align: center; margin-right: 60px;">
                        <h5>Book Your Room</h5>
                    </div>
                    <div style="width: 250px">

                        <div class="elem-group"  style="background-color:#F7F5EB; text-align: center; margin: 10px;">
                            <label for="name">Chek in - Chek out</label><br>
                            <input type="text" name="datefilter" id="busy" style="background-color:#F7F5EB;" />

                        </div>


                        <div class="elem-group" style="background-color:#F7F5EB; text-align: center;margin: 10px;">
                            <label for="room">Rooom</label><br>
                            <input type="number" id="room" name="room" style="background-color:  #F7F5EB;width: 180px;text-align: center" min="1" max="1" value="1" readonly>
                        </div>


                        <div class="elem-group" style="background-color:  #F7F5EB; text-align: center; margin: 10px;">
                            <label for="guest">Guest</label><br>
                            <input type="number" id="guest" name="guest" style="background-color:#F7F5EB;width: 180px;text-align: center" value="1" min="1" max="{{$room->guest_count}}">
                        </div>

                            <input type="hidden" id="price" name="price" style="background-color:#F7F5EB;width: 180px;text-align: center" value="{{$room->price}}">
                        {{--<div class="elem-group" style="background-color:  #F7F5EB; text-align: center; margin: 10px;">--}}
                            {{--<label for="total">Total Cost</label><br>--}}
                            {{--<input type="number" id="total" name="total" style="background-color:#F7F5EB;width: 180px;text-align: center" value="0" readonly >--}}
                        {{--</div>--}}

                        <div class="elem-group " style=" text-align: center; margin: 10px;">
                            {{--<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">--}}
                                {{--Book NOW--}}
                            {{--</button>--}}
                            <button type="submit" class="order_for_book"  data-toggle="modal" data-target="#myModal" value="{{$room->id}}"
                                    style="width: 231px;height: 55px;left: 12px;top: 412px;background: #6D8B74; color: white">Book NOW
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
            <div class="row carousel-inner" style="margin-left: -5px;">
                @foreach($room_images->slice(0,3)  as $room_image)
                <div class="col-md-3 " style="margin-right: 79px;">
                    <img class="card-img-top " style="width: 293px;height: 210px" src="{{asset($room_image->path)}}">
                </div>
                @endforeach
            </div>
            </div>
            <br><br><br>
            <div class="room_info">
                <div class="row">
                    <h4 class="title_color">{{$room->type}} Room</h4>
                    <h4 class="title_color room_info_price">{{$room->price}}$</h4>
                </div>
                <div class="section_title">
                    <div class="row">
                    <p class="card-text room_info_articals"><i class="fa fa-bed"></i> {{$room->bad}} Bad </p>
                        <p class="card-text room_info_articals"><i class="fas fa-ruler-vertical"></i> {{$room->room_size}} sqm</p>
                        <p class="card-text room_info_articals"><i class="fa fa-shower" aria-hidden="true"></i> {{$room->bathroom}} Bathroom&ensp;&ensp;</p>
                        <p class="card-text room_info_articals"><i class="fa fa-users" aria-hidden="true"></i> {{$room->guest_count}} Guest</p>
                        <p class="card-text room_info_articals"><i class="fa fa-tree" aria-hidden="true"></i> Room View
                    </p>
                    </div>
                </div>
                <div class="row mb_30">
                    <div class="room_info_description" >
                        <h5  class="service-title ">{{$room->description}}</h5>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="section_title room_info_amenities">
        <h4 class="title_color room_info_amenities_title"> Room Amenities </h4>
        <div class="">
            <div class="row">
                <div class="amenities-group col-md-3 " >
                    <h5 class="amenities-group-title">  <i class="fa fa-glass" aria-hidden="true"></i>
                        Restaurant</h5>
                </div>
                <div class="amenities-group col-md-3" >
                    <h5 class="amenities-group-title"> <i class="fa fa-wifi" aria-hidden="true"></i> Free Wifi</h5>
                </div>

                <div class="amenities-group  col-md-3" >
                    <h5 class="amenities-group-title">  <i class="fa fa-phone" aria-hidden="true"></i> Phone </h5>
                </div>
                <div class="amenities-group  col-md-3" >
                    <h5 class="amenities-group-title"> <i class="fa fa-volume-off" aria-hidden="true"></i>
                        Hair Dryer </h5>
                </div>

                <div class="amenities-group  col-md-3" >
                    <h5 class="amenities-group-title"> <i class="fa fa-snowflake-o" aria-hidden="true"></i>
                        Conditioning</h5>
                </div>
                <div class="amenities-group col-md-3" >
                    <h5 class="amenities-group-title"> <i class="fa fa-spa"></i> Spa</h5>
                </div>
                <div class="amenities-group col-md-3" >
                    <h5 class="amenities-group-title"> <i class="fas fa-swimming-pool"></i> Swimming Pool</h5>
                </div>
                <div class="amenities-group  col-md-3" style="background: rgba(247, 245, 235, 0.48);" >
                    <h5 class="amenities-group-title" style="color: #C4C4C4;">  <i class="fas fa-parking"></i> Parking</h5>
                </div>
                <div class="amenities-group  col-md-3"  style="background: rgba(247, 245, 235, 0.48);" >
                    <h5 class="amenities-group-title" style="color: #C4C4C4;">  <i class="fa fa-bars" aria-hidden="true"></i>
                         GYM</h5>
                </div>
                <div class="amenities-group  col-md-3" style="margin-right: 625px;background: rgba(247, 245, 235, 0.48);" >
                    <h5 class="amenities-group-title" style="color: #C4C4C4;"> <i class="fa fa-television" aria-hidden="true"></i>
                         TV</h5>
                </div>
            </div>
        </div>
    </div>

        {{--<div class="parent-div">--}}
            {{--<div class="image-side container">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-lg-3 service">--}}
                        {{--<img class="card-img-top" src="{{asset('page_template/image/services/cleaning.jpg')}}" alt="Card image cap">--}}
                        {{--<div class="card-body">--}}
                            {{--<h4 class="card-title">Room Cleaning</h4>--}}
                            {{--<h5>$50--}}
                                {{--<small>/month</small>--}}
                            {{--</h5>--}}
                            {{--<li><i class="fa fa-check" aria-hidden="true"></i>Hotel ut nisan the dure</li>--}}
                            {{--<li> <i class="fa fa-check" aria-hidden="true"></i>Orci miss natoque vasa ince</li>--}}
                            {{--<li> <i class="fa fa-check" aria-hidden="true"></i>Clean sorem ipsum morbin</li>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-3 service">--}}
                        {{--<img class="card-img-top" src="{{asset('page_template/image/services/drink.jpg')}}" alt="Card image cap">--}}
                        {{--<div class="card-body">--}}
                            {{--<h4 class="card-title">Drinks Included</h4>--}}
                            {{--<h5>$30--}}
                                {{--<small>/month</small>--}}
                            {{--</h5>--}}
                            {{--<li><i class="fa fa-check" aria-hidden="true"></i>Hotel ut nisan the dure</li>--}}
                            {{--<li> <i class="fa fa-check" aria-hidden="true"></i>Orci miss natoque vasa ince</li>--}}
                            {{--<li> <i class="fa fa-check" aria-hidden="true"></i>Clean sorem ipsum morbin</li>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-3 service ">--}}
                        {{--<img class="card-img-top" src="{{asset('page_template/image/services/breakfast.jpg')}}" alt="Card image cap">--}}
                        {{--<div class="card-body">--}}
                            {{--<h4 class="card-title">Room Breakfast</h4>--}}
                            {{--<h5>$20--}}
                                {{--<small>/month</small>--}}
                            {{--</h5>--}}
                            {{--<li><i class="fa fa-check" aria-hidden="true"></i>Hotel ut nisan the dure</li>--}}
                            {{--<li> <i class="fa fa-check" aria-hidden="true"></i>Orci miss natoque vasa ince</li>--}}
                            {{--<li> <i class="fa fa-check" aria-hidden="true"></i>Clean sorem ipsum morbin</li>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-lg-3 service ">--}}
                        {{--<img class="card-img-top" src="{{asset('page_template/image/services/secure.jpg')}}" alt="Card image cap">--}}
                        {{--<div class="card-body">--}}
                            {{--<h4 class="card-title">Safe & Secure</h4>--}}
                            {{--<h5>$12--}}
                                {{--<small>/month</small>--}}
                            {{--</h5>--}}
                            {{--<li><i class="fa fa-check" aria-hidden="true"></i>Hotel ut nisan the dure</li>--}}
                            {{--<li> <i class="fa fa-check" aria-hidden="true"></i>Orci miss natoque vasa ince</li>--}}
                            {{--<li> <i class="fa fa-check" aria-hidden="true"></i>Clean sorem ipsum morbin</li>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="container">
                    <h4 class="modal-title" style="color: #947A3C;
font-family: 'Cebo';
font-style: normal;
font-weight: 300;
font-size: 26px;
line-height: 26px;text-transform: uppercase;"  id="myModalLabel">Checklist</h4>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="elem-group" style="background-color:#F7F5EB; text-align: center;margin: 10px;">
                        <label for="room">Your choice is {{$hotel->name}} </label><br>
                    </div>
                    <div class="elem-group" style="background-color:#F7F5EB; text-align: center;margin: 10px;">
                        <label for="room">Your choice is {{$room->type}} Room </label><br>
                    </div>
                    <div class="elem-group" style="background-color:#F7F5EB; text-align: center;margin: 10px;">
                        <label for="room">Guests </label><br>
                        <input type="number" id="guest_count" name="guest_count" style="background-color:  #F7F5EB;width: 180px;text-align: center"  readonly>
                    </div>
                    <div class="elem-group" style="background-color:#F7F5EB; text-align: center;margin: 10px;">
                        <label for="room">Days </label><br>
                        <input type="number" id="days" name="days" style="background-color:  #F7F5EB;width: 180px;text-align: center"  readonly>
                    </div>
                    <div class="elem-group" style="background-color:#F7F5EB; text-align: center;margin: 10px;">
                        <label for="room">Total price with USD </label><br>
                        <input type="number" id="total" name="total" style="background-color:  #F7F5EB;width: 180px;text-align: center" readonly>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    <button type="submit" class="booking" value="{{$room->id}}"
                    style="width: 231px;height: 55px;left: 12px;top: 412px;background: #6D8B74; color: white">Book NOW
                    </button>
                </div>
            </div>
        </div>
    </div>
    <section class="facilities_area ">
        <div id="map-container-google-3" class="z-depth-1-half map-container-3">
        </div>
    </section><br>
@endsection