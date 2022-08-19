@extends('layouts.app')
@section('content')
    <section class="banner_area">
        <div class="booking_table d_flex align-items-center ">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0"
                 data-background=""></div>
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
                                    {{--@foreach($room_types as $room_type => $room_general_image)--}}
                                        {{--<option value="{{$room_type}}">{{$room_type}}</option>--}}
                                    {{--@endforeach--}}
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
        {{--@foreach($hotels as $hotel)--}}
            {{--<div  id="hotel-{{$hotel->id}}" data-image="{{$hotel->image_path}}" data-min="{{$hotel->rooms_min_price}}" data-count=" {{$hotel->rooms_count}}">--}}
                {{--@endforeach--}}
            {{--</div>--}}
    </section>
    <section class="accomodation_area section_gap rooms_search" style="background: #FFFEFB;">
        <div class="container" id="filter">
            <div class="section_title text-center">
                <h4 class="title_color hotels_list">Save Room list</h4>
            </div>
            @if(count($saveRooms)>0)
            <div class="row hotel_search">
                @foreach($saveRooms as  $saveRoom)
                        <div class="col-md-4">
                            <div class="container" style="text-align: center">
                                <h5><a href="{{asset(url('/hotel/'.$saveRoom->hotel->id))}}" style="color: #6D8B74">
                                        {{$saveRoom->hotel->name}}</a></h5>
                            </div>
                            <div class="carousel-inner">
                                    <div class="cards-wrapper">
                                        <div class="card">
                                                <a href="{{asset(url('/booking/room/'.$saveRoom->id))}}">
                                                    <img src="{{asset($saveRoom->image_path)}}" class="card-img-top">
                                                </a>
                                                <div class="card-body">
                                                    <div class="center price_info">
                                                        <br>
                                                        <h5  style="color: white;">From ${{$saveRoom->price}} </h5>
                                                    </div>
                                                    <a href="{{asset(url('/booking/room/'.$saveRoom->id))}}" >
                                                        <h5 class="card-title room_title ">{{$saveRoom->type}}</h5></a>
                                                    <p class="card-text"><i class="fa fa-bed"></i> {{$saveRoom->bad}} Bad&ensp;&ensp;&ensp;&ensp;
                                                        <i class="fas fa-ruler-vertical"></i>
                                                        {{$saveRoom->room_size}} sqm &ensp;&ensp;&ensp;&ensp;
                                                        <i class="fa fa-shower" aria-hidden="true"></i>
                                                        {{$saveRoom->bathroom}} Bathroom
                                                    </p>
                                                    <a href="{{asset(url('/booking/room/'.$saveRoom->id))}}" ><button class="btn theme_btn  ">
                                                            Book Now
                                                        </button></a>
                                                    <div class="elem-group " style="margin: 10px;">
                                                        <button type="submit" class="forgot_seve_room" value="{{$saveRoom->id}}"
                                                                style="width: 231px;height: 55px;left: 12px;top: 412px;background: #365454 ; color: white">
                                                            Forgot Room
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                            </div>
                        </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection