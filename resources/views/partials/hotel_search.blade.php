

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