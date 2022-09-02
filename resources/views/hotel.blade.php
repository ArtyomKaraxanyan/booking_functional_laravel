@extends('layouts.app')
@section('content')
    <section class="banner_area">
        <div class="booking_table d_flex align-items-center ">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0"
                 data-background=""></div>

            <div class="col-md-12 ">
                <div class="boking_table">
                    <div class="row justify-content-center" style=" margin-top: 450px;" id="filters">
                        {{--<div class="book_tabel_item">--}}
                            {{--<div class='input-group '>--}}
                                {{--<input type='text'   style=" width: 153px;height: 64px;left: 0px;top: 0px;background: #FFFBE9;border: 1px solid #4E4F2F; text-align:center;font-family: 'Playfair Display';font-style: normal;font-weight: 400;font-size: 24px;line-height: 32px;color: #000000;" class="form-control "  name="location" id="location" placeholder="AnyWhere"/>--}}
                                {{--<input type="hidden" name="city" id="city" class="form-control" readonly="readonly">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="book_tabel_item">
                            <div class='input-group ' >
                                <input id="start_date" name="start_date" placeholder="Cheek in" type="text" style=" text-align:center; width: 190px;height: 64px;top: 0px;background: #FFFBE9;border: 1px solid #4E4F2F;font-family: 'Playfair Display';font-style: normal;font-weight: 400;font-size: 24px;line-height: 32px;color: #000000;" class="form-control dates ">
                                <input id="end_date"  name="end_date" type="text" placeholder="Cheek out" style=" text-align:center;  width: 190px;height: 64px;top: 0px; background: #FFFBE9;border: 1px solid #4E4F2F;font-family: 'Playfair Display';font-style: normal;font-weight: 400;font-size: 24px;line-height: 32px;color: #000000;"  class="form-control dates ">
                            </div>
                        </div>
                        <div class="book_tabel_item">
                            <div class="input-group ">
                                <select name="room_type" id="room_type" class=" form-control " style="   width: 187px;height: 64px;top: 0px;background: #FFFBE9;border: 1px solid #4E4F2F;font-family: 'Playfair Display';font-style: normal;font-weight: 400;font-size: 24px;line-height: 32px;color: #000000;" >
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
                            <button style=" text-align:center;  width: 271px;height: 64px;top: 0px;background: #4E4F2F;font-family: 'Playfair Display';font-style: normal;font-weight: 700;font-size: 20px;line-height: 32px;color: #FFFBE9;" class="book_now_btn button_hover cheek_now" >Cheek Now</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--================Banner Area =================-->
    <!--================ Accomodation Area  =================-->

    <section class="accomodation_area section_gap ">
        <div class=" container  ">
            <div class="row mb_30 hotel_search  ">
                <div class="section_title text-center">
                    <h4 class="title_color hotel_title">About {{$hotel->name}} </h4>
                    <div class="parent-div">
                        <div class="big-block">
                            <div class="text-side">
                                <p class="hotel_description" style="margin-right: 50px;">{{$hotel->description}}</p>
                            </div>
                            <div class="image-side">
                                <img class="two-images first-image" src="{{asset($hotel->image_path)}}" alt="">
                                @foreach($hotel_images->slice(1,1) as $hotel_image)
                                <img class="two-images" src="{{asset($hotel_image->path)}}" alt="">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br><br>
            <div class="container cat_rooms " style="margin-top: 70px;">
                <div class="section_title text-center">
                    <h4 class="title_color rooms_hotel ">Rooms Hotel</h4>
                </div>
                <div class="row mb_30" style="margin: -60px">
                        @foreach($room_types as $room_type => $room_general_image)
                                {{--{{dd($room_types)}}--}}
                                <div class="col-lg-4 col-sm-8">
                                    <div class="accomodation_item">
                                        <div class="hotel_img">
                                        <img class="get_room_from_type" data-value="{{$room_type}}" data-id="{{$hotel->id}}" src="{{asset($room_general_image)}}" alt="">
                                        </div>
                                        <h4 class="sec_h4 room_cat_name"> {{$room_type}} Room</h4>

                                        <button class="btn get_room_from_type" data-value="{{$room_type}}" data-id="{{$hotel->id}}">Chek details
                                        </button>
                                    </div>
                                </div>
                    @endforeach
                </div>
            </div>
            <div class="row rooms cat_rooms" >
            </div>
        </div>
    </section>
    <section class="accomodation_area section_gap services" style="margin-top: -120px;">
            <div class="section_title text-center" >
                <h4 class="title_color service_hotel"> Service hotel </h4>
                <div class="container" >
                <h5  class="service-title ">The best prices for your relaxing vacation. The utanislen quam nestibulum ac quame odion elementum sceisue the aucan.
                    Orci varius natoque penatibus et magnis disney parturient monte nascete ridiculus mus nellen etesque habitant morbine.</h5>
                </div>
            </div>
        <div class="parent-div">
            <div class="image-side container">
                <div class="row">
                    <div class="col-lg-3 service">
                        <img class="card-img-top" src="{{asset('page_template/image/services/cleaning.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Room Cleaning</h4>
                            <h5>$50
                                <small>/month</small>
                            </h5>
                                <li><i class="fa fa-check" aria-hidden="true"></i>Hotel ut nisan the dure</li>
                                <li> <i class="fa fa-check" aria-hidden="true"></i>Orci miss natoque vasa ince</li>
                                <li> <i class="fa fa-check" aria-hidden="true"></i>Clean sorem ipsum morbin</li>
                        </div>
                    </div>
                    <div class="col-lg-3 service">
                        <img class="card-img-top" src="{{asset('page_template/image/services/drink.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Drinks Included</h4>
                            <h5>$30
                                <small>/month</small>
                            </h5>
                            <li><i class="fa fa-check" aria-hidden="true"></i>Hotel ut nisan the dure</li>
                            <li> <i class="fa fa-check" aria-hidden="true"></i>Orci miss natoque vasa ince</li>
                            <li> <i class="fa fa-check" aria-hidden="true"></i>Clean sorem ipsum morbin</li>
                        </div>
                    </div>
                <div class="col-lg-3 service ">
                    <img class="card-img-top" src="{{asset('page_template/image/services/breakfast.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Room Breakfast</h4>
                        <h5>$20
                            <small>/month</small>
                        </h5>
                        <li><i class="fa fa-check" aria-hidden="true"></i>Hotel ut nisan the dure</li>
                        <li> <i class="fa fa-check" aria-hidden="true"></i>Orci miss natoque vasa ince</li>
                        <li> <i class="fa fa-check" aria-hidden="true"></i>Clean sorem ipsum morbin</li>
                    </div>
                </div>

                <div class="col-lg-3 service ">
                     <img class="card-img-top" src="{{asset('page_template/image/services/secure.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Safe & Secure</h4>
                            <h5>$12
                                <small>/month</small>
                            </h5>
                            <li><i class="fa fa-check" aria-hidden="true"></i>Hotel ut nisan the dure</li>
                            <li> <i class="fa fa-check" aria-hidden="true"></i>Orci miss natoque vasa ince</li>
                            <li> <i class="fa fa-check" aria-hidden="true"></i>Clean sorem ipsum morbin</li>
                        </div>
                    </div>
            </div>
        </div>
        </div>
    </section>

    <section class=" banner_area">
        <div class="customers_feel_back d_flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0"
                 data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h5 class="customers_feel_back_title">Whay Client’s say?</h5>
                    <h6 class="customers_feel_back_description"> The best prices for your relaxing vacation. The utanislen quam nestibulum ac quame odion elementum sceisue the aucan.
                        Orci varius natoque penatibus et magnis disney parturient monte nascete ridiculus mus nellen etesque habitant morbine.</h6>
                </div>
                <div class="star" style=" margin-left: 150px;">
                    <i  class="fa fa-star"></i>
                    <i  class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i  class="fa fa-star"></i>
                    <i  class="fa fa-star"></i>
                </div>
                <p class="customer_name" >Julia Smith</p>
                <p class="customer_position" >Administrator</p>
                <img class="customer_feel_back_image" src="{{asset('page_template/image/gallery/customer.svg')}}">

            </div>
        </div>
    </section>

    <section>
            <div class="comments-area send_comment" data-url='{{route('post_comment')}}' style="background-color: #efead8">
                <h4>Comments</h4>
                <div class="comment-content">
                    @foreach($hotel->comments as $comment)
                        <div class="comment-list">
                    <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                            <div class="thumb">
                            </div>
                            <div class="desc">
                                <h5><a href="#">{{ucfirst($comment->name)}}</a></h5>
                                <p class="date">  {{$comment->created_at}} </p>
                                <p class="comment">
                                   {{$comment->comment}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                    @endforeach
                </div>
            </div>
        <div class="comment-form"  style="background-color: #efead8">
            <h4>Leave a Reply</h4>
            <form>
                <div class="form-group form-inline">
                    <div class="form-group col-lg-6 col-md-6 name">
                        <input type="text" class="form-control" id="comment_name" placeholder="Enter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                    </div>
                    <div class="form-group col-lg-6 col-md-6 email">
                        <input type="email" class="form-control" id="comment_email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="comment_subject" placeholder="Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
                </div>
                <div class="form-group">
                    <textarea maxlength="150" class="form-control mb-10" rows="5" id="comment_message" name="comment_message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                </div>
                <input type="hidden" id="comment_hotel_id" value="{{$hotel->id}}">
                <a href="#" class="primary-btn button_hover post_comment">Post Comment</a>
            </form>
        </div>
    </section>

    <section class="accomodation_area section_gap facilities_area_availability ">
        <div class="availability_title text-center" >
            <h5 class="availability_title" >Check availability</h5>

        </div>

        <div class="booking_table d_flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0"
                 data-background=""></div>
            <div class="col-md-12 ">
                <div class="boking_table">
                    <div class="row justify-content-center" style=" margin-top: -250px;" id="filters_availability">
                        {{--<div class="book_tabel_item">--}}
                            {{--<div class='input-group '>--}}
                                {{--<input type='text'   style=" width: 153px;height: 64px;left: 0px;top: 0px;background: #FFFBE9;border: 1px solid #4E4F2F; text-align:center;font-family: 'Playfair Display';font-style: normal;font-weight: 400;font-size: 24px;line-height: 32px;color: #000000;" class="form-control "  name="location" id="location" placeholder="AnyWhere"/>--}}
                                {{--<input type="hidden" name="city" id="city" class="form-control" readonly="readonly">--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="book_tabel_item availability_right">
                            <label for="start_date" class="c_label">Cheek in</label>
                            <div class='input-group availability_fonts'>
                                <input id="availability_start_date" name="start_date" placeholder="Cheek in" type="text" style=" margin-top: 8px;width: 275px;height: 55px;background: #FFFFFF;" class="form-control dates availability_fonts ">
                            </div>

                        </div>
                        <div class="book_tabel_item availability_right">
                            <label for="night" class="availability_label">Night</label>
                            <div class="input-group ">
                                <input name="night" id="night" class=" form-control availability_fonts " readonly style="width: 134px;height: 55px;background: #FFFFFF; text-align: center " value="Choose the days">
                                    {{--<option value="">Night</option>--}}
                                    {{--@for($i=1;$i<31;$i++)--}}
                                        {{--<option value="{{$i}}">{{$i}}</option>--}}
                                    {{--@endfor--}}

                            </div>
                        </div>
                        <div class="book_tabel_item availability_right">
                            <label for="end_date" class="availability_label">Cheek out</label>
                            <div class='input-group' >
                                <input id="availability_end_date"  name="end_date" type="text" placeholder="Cheek out" style=" width: 275px;height: 55px;background: #FFFFFF;"  class="form-control dates  availability_fonts">
                            </div>
                        </div>
                        <div class="book_tabel_item availability_right">
                            <label for="adult" class="availability_label">Adult</label>
                            <div class="input-group">
                                <select  name="adult" id="adult" class= " form-control availability_fonts " style="width: 134px;height: 55px;background: #FFFFFF;">
                                    <option value="0">Adult</option>
                                    @for($i=1;$i<=10;$i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="book_tabel_item availability_right">
                            <label for="children" class="availability_label">Children</label>
                            <div class="input-group">
                                <select name="children" id="children" class=" form-control availability_fonts " style="height: 55px;width: 143px;background: #FFFFFF;" >
                                    <option value="0">Children</option>
                                    @for($i=1;$i<=10;$i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="book_tabel_item">
                            <button style=" margin-top: 40px; width: 227px;height: 55px;background: #4E4F2F;font-family: 'Playfair Display';font-style: normal;font-weight: 400;line-height: 27px;color: #FFFFFF;" class="book_now_btn button_hover check_availability" value="{{$hotel->id}}" >Check Availability</button>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        {{--<div class="availability_rooms">--}}
        {{--</div>--}}
    </section>
<section class="accomodation_area section_gap facilities_area_availability_rooms availability_rooms " style="background-color: #EFEAD8;margin-top: -125px">
    {{--<div class="container">--}}
        {{--<h4 class="title_color"> {{count($rooms) <1 ? "We have not Rooms" : 'Rooms'}}  </h4>--}}
    {{--</div>--}}
    {{--<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">--}}
        {{--<div class="carousel-inner">--}}
            {{--<div class="carousel-item active">--}}
                {{--<div class="cards-wrapper">--}}
                    {{--@foreach($hotel->rooms->slice(0, 3) as $room)--}}
                        {{--<div class="card">--}}
                            {{--<a href="{{asset(url('/booking/room/'.$room->id))}}">--}}
                                {{--<img src="{{asset($room->image_path)}}" class="card-img-top">--}}
                            {{--</a>--}}
                            {{--<div class="card-body">--}}
                                {{--<div class="center price_info">--}}
                                    {{--<br>--}}
                                    {{--<h5  style="color: white;">From ${{$room->price}} </h5>--}}
                                {{--</div>--}}
                                {{--<a href="{{asset(url('/booking/room/'.$room->id))}}" >--}}
                                    {{--<h5 class="card-title room_title ">{{$room->type}}</h5></a>--}}
                                {{--<p class="card-text"><i class="fa fa-bed"></i> {{$room->bad}} Bad&ensp;&ensp;&ensp;&ensp;--}}
                                    {{--<i class="fas fa-ruler-vertical"></i>--}}
                                    {{--{{$room->room_size}} sqm &ensp;&ensp;&ensp;&ensp;--}}
                                    {{--<i class="fa fa-shower" aria-hidden="true"></i>--}}
                                    {{--{{$room->bathroom}} Bathroom--}}
                                {{--</p>--}}
                                {{--<a href="{{asset(url('/booking/room/'.$room->id))}}" ><button class="btn theme_btn  ">--}}
                                        {{--Book Now--}}
                                    {{--</button></a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--@endforeach--}}
                {{--</div>--}}

            {{--</div>--}}

            {{--<div class="carousel-item">--}}
                {{--<div class="cards-wrapper">--}}
                    {{--@foreach($hotel->rooms->slice(3, 3) as $room)--}}
                        {{--<div class="card">--}}
                            {{--<a href="{{asset(url('/booking/room/'.$room->id))}}">--}}
                                {{--<img src="{{asset($room->image_path)}}" class="card-img-top" alt="...">--}}
                            {{--</a>--}}
                            {{--<div class="card-body">--}}
                                {{--<div class="center price_info">--}}
                                    {{--<br>--}}
                                    {{--<h5  style="color: white;">From ${{$room->price}} </h5>--}}
                                {{--</div>--}}
                                {{--<a href="{{asset(url('/booking/room/'.$room->id))}}">--}}
                                    {{--<h5 class="card-title room_title ">{{$room->type}}</h5></a>--}}
                                {{--<p class="card-text"><i class="fa fa-bed"></i> {{$room->bad}} Bad&ensp;&ensp;&ensp;&ensp; <i class="fas fa-ruler-vertical"></i>--}}
                                    {{--{{$room->room_size}} sqm&ensp;&ensp;&ensp;&ensp;--}}
                                    {{--<i class="fa fa-shower" aria-hidden="true"></i> {{$room->bathroom}} Bathroom </p>--}}

                                {{--<a href="{{asset(url('/booking/room/'.$room->id))}}" ><button class="btn theme_btn  ">--}}
                                        {{--Book Now--}}
                                    {{--</button></a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--@endforeach--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="carousel-item">--}}
                {{--<div class="cards-wrapper">--}}
                    {{--@foreach($hotel->rooms->slice(6, 3) as $room)--}}
                        {{--<div class="card">--}}
                            {{--<a href="{{asset(url('/booking/room/'.$room->id))}}">--}}
                                {{--<img src="{{asset($room->image_path)}}" class="card-img-top" alt="...">--}}
                            {{--</a>--}}
                            {{--<div class="card-body">--}}
                                {{--<div class="center price_info">--}}
                                    {{--<br>--}}
                                    {{--<h5  style="color: white;">From ${{$room->price}} </h5>--}}
                                {{--</div>--}}
                                {{--<a href="{{asset(url('/booking/room/'.$room->id))}}">--}}
                                    {{--<h5 class="card-title room_title ">{{$room->type}}</h5>--}}
                                {{--</a>--}}
                                {{--<p class="card-text"><i class="fa fa-bed"></i> {{$room->bad}} Bad&ensp;&ensp;&ensp;&ensp; <i class="fas fa-ruler-vertical"></i>--}}
                                    {{--{{$room->room_size}} sqm&ensp;&ensp;&ensp;&ensp;--}}
                                    {{--<i class="fa fa-shower" aria-hidden="true"></i> {{$room->bathroom}} Bathroom </p>--}}

                                {{--<a href="{{asset(url('/booking/room/'.$room->id))}}" ><button class="btn theme_btn  ">--}}
                                        {{--Book Now--}}
                                    {{--</button></a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--@endforeach--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="carousel-item">--}}
                {{--<div class="cards-wrapper">--}}
                    {{--@foreach($hotel->rooms->slice(9, 3) as $room)--}}
                        {{--<div class="card">--}}
                            {{--<a href="{{asset(url('/booking/room/'.$room->id))}}">--}}
                                {{--<img src="{{asset($room->image_path)}}" class="card-img-top" alt="...">--}}
                            {{--</a>--}}
                            {{--<div class="card-body">--}}
                                {{--<div class="center price_info">--}}
                                    {{--<br>--}}
                                    {{--<h5  style="color: white;">From ${{$room->price}} </h5>--}}
                                {{--</div>--}}
                                {{--<a href="{{asset(url('/booking/room/'.$room->id))}}">--}}
                                    {{--<h5 class="card-title room_title ">{{$room->type}}</h5>--}}
                                {{--</a>--}}
                                {{--<p class="card-text"><i class="fa fa-bed"></i> {{$room->bad}} Bad&ensp;&ensp;&ensp;&ensp; <i class="fas fa-ruler-vertical"></i>--}}
                                    {{--{{$room->room_size}} sqm&ensp;&ensp;&ensp;&ensp;--}}
                                    {{--<i class="fa fa-shower" aria-hidden="true"></i> {{$room->bathroom}} Bathroom </p>--}}

                                {{--<a href="{{asset(url('/booking/room/'.$room->id))}}" ><button class="btn theme_btn  ">--}}
                                        {{--Book Now--}}
                                    {{--</button></a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--@endforeach--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="carousel-item">--}}
                {{--<div class="cards-wrapper">--}}
                    {{--@foreach($hotel->rooms->slice(12, 3) as $room)--}}
                        {{--<div class="card">--}}
                            {{--<a href="{{asset(url('/booking/room/'.$room->id))}}">--}}
                                {{--<img src="{{asset($room->image_path)}}" class="card-img-top" alt="...">--}}
                            {{--</a>--}}
                            {{--<div class="card-body">--}}
                                {{--<div class="center price_info">--}}
                                    {{--<br>--}}
                                    {{--<h5  style="color: white;">From ${{$room->price}} </h5>--}}
                                {{--</div>--}}
                                {{--<a href="{{asset(url('/booking/room/'.$room->id))}}">--}}
                                    {{--<h5 class="card-title room_title ">{{$room->type}}</h5>--}}
                                {{--</a>--}}
                                {{--<p class="card-text"><i class="fa fa-bed"></i> {{$room->bad}} Bad&ensp;&ensp;&ensp;&ensp; <i class="fas fa-ruler-vertical"></i>--}}
                                    {{--{{$room->room_size}} sqm&ensp;&ensp;&ensp;&ensp;--}}
                                    {{--<i class="fa fa-shower" aria-hidden="true"></i> {{$room->bathroom}} Bathroom </p>--}}

                                {{--<a href="{{asset(url('/booking/room/'.$room->id))}}" ><button class="btn theme_btn  ">--}}
                                        {{--Book Now--}}
                                    {{--</button></a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--@endforeach--}}
                {{--</div>--}}
            {{--</div>--}}

        {{--</div>--}}
        {{--@foreach($hotel->rooms as $room)--}}
            {{--@if(count($hotel->rooms)>3)--}}
                {{--<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">--}}
                    {{--<span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
                    {{--<span class="sr-only">Previous</span>--}}
                {{--</a>--}}
                {{--<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">--}}
                    {{--<span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
                    {{--<span class="sr-only">Next</span>--}}
                {{--</a>--}}
            {{--@endif--}}
        {{--@endforeach--}}
    {{--</div>--}}

</section>
    {{--<section class="facilities_area ">--}}

        {{--<div id="map-container-google-3" class="z-depth-1-half map-container-3">--}}
        {{--</div>--}}
    {{--</section>--}}
@endsection