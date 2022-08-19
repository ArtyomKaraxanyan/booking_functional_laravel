
@extends('layouts.app')
@section('content')

    {{--{{dd(Session::get('room'))}}--}}
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
                        <div class='input-group '>
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
                        <button style=" text-align:center;  width: 271px;height: 64px;top: 0px;background: #4E4F2F;font-family: 'Playfair Display';font-style: normal;font-weight: 700;font-size: 20px;line-height: 32px;color: #FFFBE9;" class="book_now_btn button_hover cheek_now" >Cheek Now</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
        {{--<div class="container">--}}
        {{--<div class="banner_content text-center">--}}
        {{--<h6>Away from monotonous life</h6>--}}
        {{--<h2>Relax Your Mind</h2>--}}
        {{--<p>If you are looking at blank cassettes on the web, you may be very confused at the<br> difference in price. You may see some for as low as $.17 each.</p>--}}
        {{--<a href="#" class="btn theme_btn button_hover">Get Started</a>--}}
        {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="hotel_booking_area position">--}}
        {{--<div class="container">--}}
            {{--<div class="hotel_booking_table">--}}
                {{--<div class="col-md-3">--}}
                {{--<h2>Book <br> Your Room </h2>--}}
                {{--</div>--}}
          {{----}}
        {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
</section>
<!--================Banner Area =================-->
<!--================ Accomodation Area  =================-->
<section class="accomodation_area section_gap" style="background: #FFFEFB;">
    <div class="container">
        <div class="section_title text-center">
            <h4 class="title_color hotels_list">Hotels list</h4>
        </div>
        <div class="row mb_30 hotel_search">
            {{--Hotel--}}
            @foreach( $hotels as $hotel)
                {{--{{dd($hotel->rooms_type_count)}}--}}
                <div class="col-lg-4 col-sm-6" id="hotel-{{$hotel->id}}" data-image="{{$hotel->image_path}}" data-min="{{$hotel->rooms_min_price}}" data-count=" {{$hotel->rooms_count}}">
                    <div class="accomodation_item">
                        <a href="{{asset(url('/hotel/'.$hotel->id))}}">
                        <div class="hotel_img">
                            <img class="hotel_image" src="{{asset($hotel->image_path)}}" alt="">
                        </div>
                        </a>
                        <div class="star">
                            <i  class="fa fa-star"></i>
                            <i  class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i  class="fa fa-star"></i>
                           <i  class="fa fa-star"></i>
                        </div>
                            <a href="{{asset(url('/hotel/'.$hotel->id))}}">   <h4 class="sec_h4">{{$hotel->name}}</h4></a>
                    </div>
                </div>
            @endforeach
            {{--End HOtel --}}
            {{--<div class="col-lg-3 col-sm-6">--}}
                {{--<div class="accomodation_item text-center">--}}
                    {{--<div class="hotel_img">--}}
                        {{--<img src="{{asset('page_template/image/room2.jpg')}}" alt="">--}}
                        {{--<a href="#" class="btn theme_btn button_hover">Book Now</a>--}}
                    {{--</div>--}}
                    {{--<a href="#"><h4 class="sec_h4">Single Deluxe Room</h4></a>--}}
                    {{--<h5>$200<small>/night</small></h5>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-lg-3 col-sm-6">--}}
                {{--<div class="accomodation_item text-center">--}}
                    {{--<div class="hotel_img">--}}
                        {{--<img src="image/room3.jpg" alt="">--}}
                        {{--<a href="#" class="btn theme_btn button_hover">Book Now</a>--}}
                    {{--</div>--}}
                    {{--<a href="#"><h4 class="sec_h4">Honeymoon Suit</h4></a>--}}
                    {{--<h5>$750<small>/night</small></h5>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-lg-3 col-sm-6">--}}
                {{--<div class="accomodation_item text-center">--}}
                    {{--<div class="hotel_img">--}}
                        {{--<img src="image/room4.jpg" alt="">--}}
                        {{--<a href="#" class="btn theme_btn button_hover">Book Now</a>--}}
                    {{--</div>--}}
                    {{--<a href="#"><h4 class="sec_h4">Economy Double</h4></a>--}}
                    {{--<h5>$200<small>/night</small></h5>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
</section>

<section class="facilities_area ">
    <div id="map-container-google-3" class="z-depth-1-half map-container-3">
    </div>
</section><br>
{{--<section class="about_history_area section_gap">--}}
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-6 d_flex align-items-center">--}}
                {{--<div class="about_content ">--}}
                    {{--<h2 class="title title_color">About Us <br>Our History<br>Mission & Vision</h2>--}}
                    {{--<p>inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach. inappropriate behavior is often laughed.</p>--}}
                    {{--<a href="#" class="button_hover theme_btn_two">Request Custom Price</a>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-6">--}}
                {{--<img class="img-fluid" src="image/about_bg.jpg" alt="img">--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</section>--}}
{{--<!--================ About History Area  =================-->--}}

{{--<!--================ Testimonial Area  =================-->--}}
{{--<section class="testimonial_area section_gap">--}}
    {{--<div class="container">--}}
        {{--<div class="section_title text-center">--}}
            {{--<h2 class="title_color">Testimonial from our Clients</h2>--}}
            {{--<p>The French Revolution constituted for the conscience of the dominant aristocratic class a fall from </p>--}}
        {{--</div>--}}
        {{--<div class="testimonial_slider owl-carousel">--}}
            {{--<div class="media testimonial_item">--}}
                {{--<img class="rounded-circle" src="image/testtimonial-1.jpg" alt="">--}}
                {{--<div class="media-body">--}}
                    {{--<p>As conscious traveling Paupers we must always be concerned about our dear Mother Earth. If you think about it, you travel across her face, and She is the </p>--}}
                    {{--<a href="#"><h4 class="sec_h4">Fanny Spencer</h4></a>--}}
                    {{--<div class="star">--}}
                        {{--<a href="#"><i class="fa fa-star"></i></a>--}}
                        {{--<a href="#"><i class="fa fa-star"></i></a>--}}
                        {{--<a href="#"><i class="fa fa-star"></i></a>--}}
                        {{--<a href="#"><i class="fa fa-star"></i></a>--}}
                        {{--<a href="#"><i class="fa fa-star-half-o"></i></a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="media testimonial_item">--}}
                {{--<img class="rounded-circle" src="image/testtimonial-1.jpg" alt="">--}}
                {{--<div class="media-body">--}}
                    {{--<p>As conscious traveling Paupers we must always be concerned about our dear Mother Earth. If you think about it, you travel across her face, and She is the </p>--}}
                    {{--<a href="#"><h4 class="sec_h4">Fanny Spencer</h4></a>--}}
                    {{--<div class="star">--}}
                        {{--<a href="#"><i class="fa fa-star"></i></a>--}}
                        {{--<a href="#"><i class="fa fa-star"></i></a>--}}
                        {{--<a href="#"><i class="fa fa-star"></i></a>--}}
                        {{--<a href="#"><i class="fa fa-star"></i></a>--}}
                        {{--<a href="#"><i class="fa fa-star-half-o"></i></a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="media testimonial_item">--}}
                {{--<img class="rounded-circle" src="image/testtimonial-1.jpg" alt="">--}}
                {{--<div class="media-body">--}}
                    {{--<p>As conscious traveling Paupers we must always be concerned about our dear Mother Earth. If you think about it, you travel across her face, and She is the </p>--}}
                    {{--<a href="#"><h4 class="sec_h4">Fanny Spencer</h4></a>--}}
                    {{--<div class="star">--}}
                        {{--<a href="#"><i class="fa fa-star"></i></a>--}}
                        {{--<a href="#"><i class="fa fa-star"></i></a>--}}
                        {{--<a href="#"><i class="fa fa-star"></i></a>--}}
                        {{--<a href="#"><i class="fa fa-star"></i></a>--}}
                        {{--<a href="#"><i class="fa fa-star-half-o"></i></a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="media testimonial_item">--}}
                {{--<img class="rounded-circle" src="image/testtimonial-1.jpg" alt="">--}}
                {{--<div class="media-body">--}}
                    {{--<p>As conscious traveling Paupers we must always be concerned about our dear Mother Earth. If you think about it, you travel across her face, and She is the </p>--}}
                    {{--<a href="#"><h4 class="sec_h4">Fanny Spencer</h4></a>--}}
                    {{--<div class="star">--}}
                        {{--<a href="#"><i class="fa fa-star"></i></a>--}}
                        {{--<a href="#"><i class="fa fa-star"></i></a>--}}
                        {{--<a href="#"><i class="fa fa-star"></i></a>--}}
                        {{--<a href="#"><i class="fa fa-star"></i></a>--}}
                        {{--<a href="#"><i class="fa fa-star-half-o"></i></a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</section>--}}
{{--<!--================ Testimonial Area  =================-->--}}

{{--<!--================ Latest Blog Area  =================-->--}}
{{--<section class="latest_blog_area section_gap">--}}
    {{--<div class="container">--}}
        {{--<div class="section_title text-center">--}}
            {{--<h2 class="title_color">latest posts from blog</h2>--}}
            {{--<p>The French Revolution constituted for the conscience of the dominant aristocratic class a fall from </p>--}}
        {{--</div>--}}
        {{--<div class="row mb_30">--}}
            {{--<div class="col-lg-4 col-md-6">--}}
                {{--<div class="single-recent-blog-post">--}}
                    {{--<div class="thumb">--}}
                        {{--<img class="img-fluid" src="image/blog/blog-1.jpg" alt="post">--}}
                    {{--</div>--}}
                    {{--<div class="details">--}}
                        {{--<div class="tags">--}}
                            {{--<a href="#" class="button_hover tag_btn">Travel</a>--}}
                            {{--<a href="#" class="button_hover tag_btn">Life Style</a>--}}
                        {{--</div>--}}
                        {{--<a href="#"><h4 class="sec_h4">Low Cost Advertising</h4></a>--}}
                        {{--<p>Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A farmer.</p>--}}
                        {{--<h6 class="date title_color">31st January,2018</h6>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-lg-4 col-md-6">--}}
                {{--<div class="single-recent-blog-post">--}}
                    {{--<div class="thumb">--}}
                        {{--<img class="img-fluid" src="image/blog/blog-2.jpg" alt="post">--}}
                    {{--</div>--}}
                    {{--<div class="details">--}}
                        {{--<div class="tags">--}}
                            {{--<a href="#" class="button_hover tag_btn">Travel</a>--}}
                            {{--<a href="#" class="button_hover tag_btn">Life Style</a>--}}
                        {{--</div>--}}
                        {{--<a href="#"><h4 class="sec_h4">Creative Outdoor Ads</h4></a>--}}
                        {{--<p>Self-doubt and fear interfere with our ability to achieve or set goals. Self-doubt and fear are</p>--}}
                        {{--<h6 class="date title_color">31st January,2018</h6>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-lg-4 col-md-6">--}}
                {{--<div class="single-recent-blog-post">--}}
                    {{--<div class="thumb">--}}
                        {{--<img class="img-fluid" src="image/blog/blog-3.jpg" alt="post">--}}
                    {{--</div>--}}
                    {{--<div class="details">--}}
                        {{--<div class="tags">--}}
                            {{--<a href="#" class="button_hover tag_btn">Travel</a>--}}
                            {{--<a href="#" class="button_hover tag_btn">Life Style</a>--}}
                        {{--</div>--}}
                        {{--<a href="#"><h4 class="sec_h4">It S Classified How To Utilize Free</h4></a>--}}
                        {{--<p>Why do you want to motivate yourself? Actually, just answering that question fully can </p>--}}
                        {{--<h6 class="date title_color">31st January,2018</h6>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</section>--}}
<!--================ Recent Area  =================-->

<!--================ start footer Area  =================-->
@endsection