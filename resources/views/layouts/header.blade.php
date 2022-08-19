<header class="header_area" style="height: 140px;background-color: transparent;background: linear-gradient(180deg, #000000 2.08%, rgba(255, 255, 255, 0) 65%); ">
        <nav class="navbar navbar-expand-lg navbar-light" style="height: 140px;background-color: transparent;background: linear-gradient(180deg, #000000 2.08%, rgba(255, 255, 255, 0) 0%);">
            <!-- Brand and toggle get grouped for better mobile display -->
            <h2 class="header_logo">
                <a   href="/" style=""> <img  style=" margin-left: 30px;" src="{{asset('page_template/image/banner/vectors.svg')}}"></a><br>
                <a  class="header_logo" href="/" style="">Hotel</a></h2>

             <ul class="nav navbar-nav menu_nav ml-auto" style="position: absolute;width: 600px;left: 665px;top: 20px;">
                <li class="nav-item"><butaton class=" btn nav-link our_address" data-toggle="modal" data-target="#myModalMap" style="margin-right: 40px;  text-transform: capitalize;font-family: 'Playfair Display';font-style: normal;font-weight: 400;font-size: 20px;line-height: 25px;color: #FFFFFF;" ><i class="fa fa-map-marker" style="color: #6D8B74" aria-hidden="true"></i> Address 1</butaton></li>
                <li class="nav-item"><butaton class=" btn nav-link" data-toggle="modal" data-target="#myModalGmail" href="" style="margin-right: 40px;  text-transform: lowercase;font-family: 'Playfair Display';font-style: normal;font-weight: 400;font-size: 20px;line-height: 25px;color: #FFFFFF;"><i class="fa fa-envelope-open" aria-hidden="true" style="color: #6D8B74"></i> hotel@gmail.com</butaton></li>
                <li class="nav-item"><p class="nav-link"  style="margin-right: 20px;font-family: 'Playfair Display';font-style: normal;font-weight: 400;font-size: 20px;line-height: 25px;color: #FFFFFF;"><i class="fa fa-phone" aria-hidden="true" style="color: #6D8B74"></i> +960 20 30 50</p></li>
             </ul>
            <hr  style="position: absolute;width: 543px;left: 672px;top: 40px;border: 1px solid #5F7161"><br>
            <div class="collapse navbar-collapse " id="">
                <ul class="nav navbar-nav menu_nav ml-auto">
                    <li class="nav-item"><a class="nav-link " style="margin-top: 25px; margin-right: 25px;font-family: 'Playfair Display';font-style: normal;font-size: 17px;color: #FFFFFF;" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="" style="margin-top: 25px; margin-right: 25px;font-family: 'Playfair Display';font-style: normal;font-size: 15px;color: #FFFFFF">About us</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{asset(route('rooms'))}}" style="margin-top: 25px;margin-right: 25px;font-family: 'Playfair Display';font-style: normal;font-size: 15px;color: #FFFFFF">Rooms</a></li>
                    <li class="nav-item"><a class="nav-link" href="" style="margin-top: 25px;margin-right: 25px;font-family: 'Playfair Display';font-style: normal;font-size: 15px;color: #FFFFFF">Services</a></li>

                    <li class="nav-item"><a class="nav-link" href=""   @if( Session::has('room_id')) style="margin-top: 25px;margin-right: 8px;font-family: 'Playfair Display';font-style: normal;font-size: 15px;color: #FFFFFF"

                                            @else  style="margin-top: 25px;margin-right: 77px;font-family: 'Playfair Display';font-style: normal;font-size: 15px;color: #FFFFFF"  @endif  >Contacts</a></li>

                </ul><br>
            </div>
            <ul>

                @if( Session::has('room_id'))<li class="nav-item"><a href="{{asset(url('save/rooms'))}}"><i class="fa fa-shopping-cart" aria-hidden="true" style="font-size:30px;color:#365454;margin-right: 35px;"></i></a>
                 <p  class="" style="margin-top: -40px;color: red;margin-left: 35px;">{{count(Session::get('room_id'))}}</p></li>@endif
            </ul>
        </nav>

</header>
<div class="modal fade" id="myModalGmail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="container">
                    <h4 class="modal-title" style="color: #947A3C;
font-family: 'Cebo';
font-style: normal;
font-weight: 300;
font-size: 26px;
line-height: 26px;text-transform: uppercase;"  id="myModalLabel">Send Message</h4>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @if ($errors->has('email'))
                    @endif
                </div>
            @endif
            <form action="{{asset(route('send_email'))}}" method="get">
            <div class="modal-body">
                <div class="elem-group" style="background-color:#F7F5EB; text-align: center;margin: 10px;">
                    <label for="room">Your Gmail </label><br>
                    <input type="email" id="user_email" name="user_email" style="background-color:#F7F5EB;width: 280px;text-align: center" >
                </div>
                <div class="elem-group" style="background-color:#F7F5EB; text-align: center;margin: 10px;">
                    <label for="room">Description </label><br>
                    <textarea  id="message" name="message" style="background-color:#F7F5EB;width: 280px;text-align: center"  ></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                <button type="submit" class="send_message"
                        style="width: 231px;height: 55px;left: 12px;top: 412px;background: #6D8B74; color: white">Send Message
                </button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="myModalMap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="container">
                    <h4 class="modal-title" style="color: #947A3C;
font-family: 'Cebo';
font-style: normal;
font-weight: 300;
font-size: 26px;
line-height: 26px;text-transform: uppercase;"  id="myModalLabel">Send Message</h4>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
                <div class="modal-body">
                    {{--<div id="map-google-4" class="map-4">--}}
                    {{--</div>--}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
        </div>
    </div>
</div>