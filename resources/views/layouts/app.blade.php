<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{--<link rel="icon" href="{{asset('page_template/image/favicon.png')}}" type="image/png">--}}
    <title> Hotel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href=" {{asset('page_template/css/bootstrap.css')}}">
    <link rel="stylesheet" href=" {{asset('page_template/vendors/linericon/style.css')}}">
    <link rel="stylesheet" href=" {{asset('page_template/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href=" {{asset('page_template/vendors/owl-carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href=" {{asset('page_template/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href=" {{asset('page_template/vendors/bootstrap-datepicker/bootstrap-select.css')}}">
    <link rel="stylesheet" href=" {{asset('page_template/vendors/nice-select/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('page_template/vendors/owl-carousel/owl.carousel.min.css')}}">
    <!-- main css -->
    <link rel="stylesheet" href="{{asset('page_template/css/style.css')}}">
    <link rel="stylesheet" href=" {{asset('page_template/css/responsive.css')}}">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>

    {{--<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js" type="text/javascript"></script>--}}

</head>
<body>
@include('layouts.header')

@yield('content')

@include('layouts.footer')
<script src="{{asset('page_template/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('page_template/js/popper.js')}}"></script>
<script src="{{asset('page_template/js/bootstrap.min.js')}}"></script>
<script src=" {{asset('page_template/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
<script src=" {{asset('page_template/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('page_template/js/mail-script.js')}}"></script>
<script src="{{asset('page_template/vendors/nice-select/js/jquery.nice-select.js')}}"></script>
<script src="{{asset('page_template/js/mail-script.js')}}"></script>
<script src="{{asset('page_template/js/stellar.js')}}"></script>
<script src=" {{asset('page_template/vendors/lightbox/simpleLightbox.min.js')}}"></script>
<script src="{{asset('page_template/js/custom.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?&libraries=places&language=en&key={{config('app.google_map_key') }}&callback=initMap" defer></script>
{{--<script type="text/javascript" src="https://maps.google.com/maps/api/js?&libraries=places&language=en&key={{config('app.google_map_key') }}&callback=headerinitMap" defer></script>--}}
<script type="text/javascript"
        src="https://maps.google.com/maps/api/js?&libraries=places&key={{config('app.google_map_key') }}&callback=initMap">
</script>

<script src="{{asset('my_js/autocomplete.js')}}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

{{--<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>--}}
{{--<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>--}}
{{--<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>--}}
{{--<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />--}}


<script>
    import swal from 'sweetalert2';
    window.Swal = swal;

</script>

<script type="text/javascript">

    $(document).on('click','.post_comment',function (event) {
        event.preventDefault();
        let name=$('#comment_name').val();
        let country=$('#feel_back_country').val();
        let email=$('#comment_email').val();
        let subject=$('#comment_subject').val();
        let message=$('#comment_message').val();
        let hotelId=$('#comment_hotel_id').val();
        let url =$('.send_comment').data('url');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}",
            },
            url: url,
            method: "GET",
            data: {name:name,email:email,subject:subject,message:message,hotelId:hotelId},
        }).done(function (data) {
            $.each(data.errors, function(key, value){
                function SwalValidComment(value){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: value,
                    });
                }
                SwalValidComment(value)
            });

            $('.comment-content').append(data)
            $('#comment_name').val("");
            $('#comment_email').val("");
            $('#comment_subject').val("");
            $('#comment_message').val("");
        });
    });
    function SwalNotRoom(){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'You have not saved room',
        });
    }
    function SwalNotDays(){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'You have not chosen days',
        });
    }
       $(document).on('click','.show_save_rooms',function (e) {
           e.preventDefault();
               SwalNotRoom()
       });
    function SwalconfirmBook(){
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Have a nice holidays',
            showConfirmButton: false,
            timer: 1500
        });
    }

    function Swalconfirm(data){
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: data.massage,
            showConfirmButton: false,
            timer: 1500
        });
 setTimeout(function(){
    window.location.reload(1);
}, 1500);

 setTimeout()
    }
    $(document).on('click','.save_room',function (event) {
        event.preventDefault();
        let id=$(this).val();
        let url=$('.save_room_url').data('save');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}",
            },
            url: url,
            method: "GET",
            data: {id:id},
        }).done(function (data) {
             Swalconfirm(data);
        });

    });

    $(document).on('click','.forgot_room',function (event) {
        event.preventDefault();
        let id=$(this).val();
        let url=$('.save_room_url').data('forgot');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}",
            },
            url: url,
            method: "GET",
            data: {id:id},
        }).done(function (data) {

            Swalconfirm(data);
        });

    });

    $(document).on('click','.forgot_seve_room',function (event) {
        event.preventDefault();
        let id=$(this).val();
        var url = '{{ route("forgot_room", ":id") }}';
        url = url.replace(':id', id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}",
            },
            url: url,
            method: "GET",
            data: {id:id},
        }).done(function (data) {

            Swalconfirm(data);
        });

    })




</script>

<script type="text/javascript">
    let header_map;
    function initMap() {
        let geocoder = new google.maps.Geocoder();
        let location = "Armenia";
        geocoder.geocode({ 'address': location }, function(results, status){
            if (status == google.maps.GeocoderStatus.OK) {
                header_map.setCenter(results[0].geometry.location);
            } else {
                alert("Could not find location: " + location);
            }
        });
        header_map = new google.maps.Map(document.getElementById("map-google-4"), {
            // center: location,
            zoom:2.5,
        });
        var hotel_markers = {!! json_encode($hotels->toArray()) !!}
            locations= hotel_markers;
        var marker, i;
        var infowindow = new google.maps.InfoWindow();
        google.maps.event.addListener(header_map, 'click', function() {
            infowindow.close();
        });
        for (i = 0; i <locations.length; i++) {
            let hotel_element = $('#hotel-'+locations[i].id);
            let image = hotel_element.data('image');
            let min_price = hotel_element.data('min');
            const content =
                '<div class="row">'+
                '<div  class="accomodation_item text-center" id="siteNotice">'+
                '<div class="col-md-8 " style="max-width: 100%;" >' +
                '<h5>' + locations[i].name + '</h5>'+
                ' <div class="star">' +
                ' <a  href="#"><i  class="fa fa-star"></i></a>\n' +
                ' <a href="#"><i  class="fa fa-star"></i></a>\n' +
                ' <a href="#"><i class="fa fa-star"></i></a>\n' +
                ' <a href="#"><i  class="fa fa-star"></i></a>\n' +
                ' <a href="#"><i  class="fa fa-star"></i></a>\n' +
                ' </div>' +
                '<img class="hotel_image_map"    src="'+ image+'">'
                + '<h5>' + "Min room price $" + min_price +
                '<small>/night</small>' +
                '</h5>'+
                ' </div>' +
                "</div>" +
                "</div>";
            const infowindow = new google.maps.InfoWindow({
                content: content,
            });
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i].latitude, locations[i].longitude),
                title: locations[i].name,
                map: header_map,
                icon: { url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"}
            });
            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    infowindow.setContent(locations[i]);
                    infowindow.open(header_map, marker);
                }
            })(marker, i));
        }
    }
    google.maps.event.addDomListener(window, 'load', initialize);

    function myClick(id) {
        google.maps.event.trigger(markers[id], 'click');
    }
     window.initMap = initMap;
</script>

@php($title = Request::route()->getName())
@if($title == "search_hotels" )
    <script type="text/javascript">
        let map;
        function initMap() {
            let geocoder = new google.maps.Geocoder();
            let location = "Armenia";
            geocoder.geocode({ 'address': location }, function(results, status){
                if (status == google.maps.GeocoderStatus.OK) {
                    map.setCenter(results[0].geometry.location);
                } else {
                    alert("Could not find location: " + location);
                }
            });
            map = new google.maps.Map(document.getElementById("map-container-google-3"), {
                // center: location,
                zoom:2.5,
            });
            var hotel_markers = {!! json_encode($hotels->toArray()) !!}
                locations= hotel_markers;
            var marker, i;
            var infowindow = new google.maps.InfoWindow();
            google.maps.event.addListener(map, 'click', function() {
                infowindow.close();
            });
            for (i = 0; i <locations.length; i++) {
                let hotel_element = $('#hotel-'+locations[i].id);
                let image = hotel_element.data('image');
                let min_price = hotel_element.data('min');
                const content =
                    '<div class="row">'+
                    '<div  class="accomodation_item text-center" id="siteNotice">'+
                    '<div class="col-md-8 " style="max-width: 100%;" >' +
                    '<h5>' + locations[i].name + '</h5>'+
                    ' <div class="star">' +
                    ' <a  href="#"><i  class="fa fa-star"></i></a>\n' +
                    ' <a href="#"><i  class="fa fa-star"></i></a>\n' +
                    ' <a href="#"><i class="fa fa-star"></i></a>\n' +
                    ' <a href="#"><i  class="fa fa-star"></i></a>\n' +
                    ' <a href="#"><i  class="fa fa-star"></i></a>\n' +
                    ' </div>' +
                    '<img class="hotel_image_map"    src="'+ image+'">'
                    + '<h5>' + "Min room price $" + min_price +
                    '<small>/night</small>' +
                    '</h5>'+
                    ' </div>' +
                    "</div>" +
                    "</div>";
                const infowindow = new google.maps.InfoWindow({
                    content: content,
                });
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i].latitude, locations[i].longitude),
                    title: locations[i].name,
                    map: map,
                    icon: { url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"}
                });
                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                    return function () {
                        infowindow.setContent(locations[i]);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
            }
        }
        google.maps.event.addDomListener(window, 'load', initialize);

        function myClick(id) {
            google.maps.event.trigger(markers[id], 'click');
        }

        window.initMap = initMap;
    </script>

@endif
@if($title == "book_hotel" || $title == "booking_room" )
    <script type="text/javascript">
        function initMap() {
            let map;
            let marker;
            map = new google.maps.Map(document.getElementById("map-container-google-3"), {
                zoom: 15,
            });
            var hotel_location = {!! $hotel->toJson() !!};
            let geocoder = new google.maps.Geocoder();
            geocoder.geocode({'address': hotel_location.city}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    map.setCenter(marker.getPosition());
                }
            });

            var service = new google.maps.places.PlacesService(map);
            service.nearbySearch({
                location: new google.maps.LatLng(hotel_location.latitude, hotel_location.longitude),
                radius: 5000,
                type: ['restaurant']
            }, callback);

            function callback(results, status) {
                if (status === google.maps.places.PlacesServiceStatus.OK) {
                    for (var i = 0; i < results.length; i++) {
                        createMarker(results[i]);
                        showRestaurant(results[i]);
                    }
                }
            }
            function showRestaurant(restaurants) {

                // console.log(restaurants);

            }

            function createMarker(place) {
                var placeLoc = place.geometry.location;
                var marker = new google.maps.Marker({
                    map: map,
                    position: place.geometry.location,
                    icon: { url: "http://maps.google.com/mapfiles/ms/icons/green-dot.png"}
                });

                google.maps.event.addListener(marker, 'click', function () {
                    infowindow.setContent(place.name);
                    infowindow.open(map, this);
                });

            }
            const svgMarker = {
                path: "M10.453 14.016l6.563-6.609-1.406-1.406-5.156 5.203-2.063-2.109-1.406 1.406zM12 2.016q2.906 0 4.945 2.039t2.039 4.945q0 1.453-0.727 3.328t-1.758 3.516-2.039 3.070-1.711 2.273l-0.75 0.797q-0.281-0.328-0.75-0.867t-1.688-2.156-2.133-3.141-1.664-3.445-0.75-3.375q0-2.906 2.039-4.945t4.945-2.039z",
                fillColor: "blue",
                fillOpacity: 0.6,
                strokeWeight: 0,
                rotation: 0,
                scale: 2,
                anchor: new google.maps.Point(15, 30),
            };
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(hotel_location.latitude, hotel_location.longitude),
                title: hotel_location.name,
                map: map,
                icon: { url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"}
            });
        }
         window.initMap = initMap;
    </script>
@endif

<script type="text/javascript">

    $('.dates').datepicker({
        format: 'yyyy-mm-dd',
        autoclose:true
    });

    //Search hotels and filters

    $(document).on('click', '.cheek_now', function () {
        let map;
        function globalMap() {
            let geocoder = new google.maps.Geocoder();
            let location = "Armenia";
            geocoder.geocode({ 'address': location }, function(results, status){
                if (status == google.maps.GeocoderStatus.OK) {
                    map.setCenter(results[0].geometry.location);
                } else {
                    alert("Could not find location: " + location);
                }
            });
            map = new google.maps.Map(document.getElementById("map-container-google-3"), {
                // center: location,
                zoom:2.5,
            });

            var hotel_markers = {!! json_encode($hotels->toArray()) !!}
                locations= hotel_markers;
            var marker, i;
            var infowindow = new google.maps.InfoWindow();

            google.maps.event.addListener(map, 'click', function() {
                infowindow.close();
            });

            for (i = 0; i <locations.length; i++) {
                let hotel_element = $('#hotel-'+locations[i].id);
                let image = hotel_element.data('image');
                let min_price = hotel_element.data('min');
                // let room_count = hotel_element.data('count');
                // let room_type_count = hotel_element.data('type');
                //   console.log(locations[i]);
                const content =
                    '<div class="row">'+
                    '<div  class="accomodation_item text-center" id="siteNotice">'+
                    '<div class="col-md-8 " style="max-width: 100%;" >' +
                    '<h5>' + locations[i].name + '</h5>' +
                    ' <div class="star">' +
                    ' <a  href="#"><i  class="fa fa-star"></i></a>\n' +
                    ' <a href="#"><i  class="fa fa-star"></i></a>\n' +
                    ' <a href="#"><i class="fa fa-star"></i></a>\n' +
                    ' <a href="#"><i  class="fa fa-star"></i></a>\n' +
                    ' <a href="#"><i  class="fa fa-star"></i></a>\n' +
                    ' </div>' +
                    '<img class="hotel_image_map"    src="'+ image+'">'
                    + '<h5>' + " Min room price $" + min_price +
                    '<small>/night</small>' +
                    '</h5>'+
                    ' </div>' +
                    "</div>" +
                    "</div>";
                const infowindow = new google.maps.InfoWindow({
                    content: content,
                });
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i].latitude, locations[i].longitude),
                    title: locations[i].name,
                    map: map,
                    icon: { url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"}
                });
                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                    return function () {
                        infowindow.setContent(locations[i]);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
            }
        }
        google.maps.event.addDomListener(window, 'load', initialize);

        function myClick(id) {
            google.maps.event.trigger(markers[id], 'click');
        }
        let data = $('#filters').find('input#city,input#location,input#start_date,input#end_date,select#room_type ').serialize();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}",
            },
            url: '{{route('search_hotels')}}',
            method: "GET",
            data: data,
        }).done(function (data) {

            $('.hotel_search').html(data.hotels);
            $('.services').empty();
            $('.cat_rooms').empty();

            var locations = data.get_hotels;
            // console.log(locations);
            let city = data.address;
            if(city){
                initMap(city, locations);
            }else {
                globalMap()
            }

        });

        function initMap(city,locations) {
            let geocoder = new google.maps.Geocoder();
            let location = city;
            geocoder.geocode({'address': location}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    map.setCenter(results[0].geometry.location);
                } else {
                    alert("Could not find location: " + location);
                }
            });
            map = new google.maps.Map(document.getElementById("map-container-google-3"), {
                center: location,
                zoom: 12.5,
            });

            if (locations.length>0) {
                var marker, i;

                var infowindow = new google.maps.InfoWindow();

                google.maps.event.addListener(map, 'click', function() {
                    infowindow.close();
                });
                for (i = 0; i < locations.length; i++) {
                    let hotel_element = $('#hotel-'+locations[i].id);
                    let image = hotel_element.data('image');
                    let min_price = hotel_element.data('min');
                    // console.log(min_price);
                    const content =
                        '<div class="row">' +
                        '<div  class="accomodation_item text-center" id="siteNotice">' +
                        '<div class="col-md-8 " style="max-width: 100%;" >' +
                        '<h5>' + locations[i].name + '</h5>' +
                        ' <div class="star">' +
                        ' <a  href="#"><i  class="fa fa-star"></i></a>\n' +
                        ' <a href="#"><i  class="fa fa-star"></i></a>\n' +
                        ' <a href="#"><i class="fa fa-star"></i></a>\n' +
                        ' <a href="#"><i  class="fa fa-star"></i></a>\n' +
                        ' <a href="#"><i  class="fa fa-star"></i></a>\n' +
                        ' </div>' +
                        '<img class="hotel_image_map"    src="'+ image+'">'
                        + '<h5>' + "Min room price $" + min_price +
                        '<small>/night</small>' +
                        '</h5>'+
                        ' </div>' +



                        "</div>" +
                        "</div>";

                    const infowindow = new google.maps.InfoWindow({
                        content: content,
                    });
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[i].latitude, locations[i].longitude),
                        title: locations[i].name,
                        map: map,
                        icon: { url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"}
                    });
                    google.maps.event.addListener(marker, 'click', (function (marker, i) {
                        return function () {
                            infowindow.setContent(locations[i]);
                            infowindow.open(map, marker);
                        }
                    })(marker, i));
                }
            }
            else{

                alert("Could not find Hotels in : " + location);
            }

        google.maps.event.addDomListener(window, 'load', initialize);

        function myClick(id) {
            google.maps.event.trigger(markers[id], 'click');
        }
        }


    });
    $(document).on('click', '.get_room_from_type', function () {
        let data = $(this);
        let id=data.data('id');
        let type=data.data('value');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}",
            },
            url: '{{url('hotel/')}}'+'/'+id,
            method: "GET",
            data: {type:type},
        }).done(function (data) {
            $('.rooms').html(data.hotel_rooms);
        });
    });
    $(document).on('click', '.check_availability', function () {
        let id=$(this).val();
        let data = $('#filters_availability').find('select#adult,select#children,input#availability_start_date,input#availability_end_date ').serialize();
        let start_date=$('#availability_start_date').val();
        let end_date=$('#availability_end_date').val();
        let date1 = new Date(end_date);
        let date2 = new Date(start_date);
        let difference = date1.getTime() - date2.getTime();
        let nights = Math.ceil(difference / (1000 * 3600 * 24));
        if((start_date.length !==0 && end_date.length !==0 )){
            $('#night').val(nights);
        }else {
            $('#night').val(0);
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}",
            },
            url: '{{url('/hotel/rooms/')}}'+'/'+id,
            method: "GET",
            data: data,
        }).done(function (data) {
            $('.availability_rooms').html(data.hotel_rooms);

        });

    });


</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@if($title == "booking_room")

<script>
$(function() {

    // $('#busy').daterangepicker({ startDate: '06/03/2022', endDate: '06/10/2022' });

    $('input[name="datefilter"]').daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear',
            format: 'YYYY/MMM/DD'

        }
    });

    $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));

    });

    $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });
    var busy = {!! json_encode($busy_days) !!};


    let disable=[];
    for(let i=0;i<busy.length;i++){

        function getDates(startDate, stopDate) {
            var dateArray = [];
            var currentDate = moment(startDate);
            var stopDate = moment(stopDate);
            while (currentDate <= stopDate) {
                dateArray.push( moment(currentDate).format('MM/DD/YYYY') );
                currentDate = moment(currentDate).add(1, 'days');
            }
            return dateArray;
        }
        var sample =  getDates(busy[i].start,busy[i].end);
        // console.log(sample);

        for (let j=0;j<sample.length;j++){
            disable.push(sample[j]);

        }

    }
    let  disabledArr =disable;
    var date = new Date();
    var dateToday = new Date();
    $("#busy").daterangepicker({
        minDate: dateToday,
        isInvalidDate: function(arg){
            var thisMonth = arg._d.getMonth()+1;
            if (thisMonth<10){
                thisMonth = "0"+thisMonth;
            }
            var thisDate = arg._d.getDate();
            if (thisDate<10){
                thisDate = "0"+thisDate;
            }
            var thisYear = arg._d.getYear()+1900;

            var thisCompare = thisMonth +"/"+ thisDate +"/"+ thisYear;
            if($.inArray(thisCompare,disabledArr)!=-1){
                return true;
            }
        }

    }).focus();
    $("#busy").on("apply.daterangepicker",function(e,picker){
        var startDate = picker.startDate.format('MM/DD/YYYY');
        var endDate = picker.endDate.format('MM/DD/YYYY');
        // console.log(startDate+" to "+endDate);

        var clearInput = false;
        for(i=0;i<disabledArr.length;i++){
            if(startDate<disabledArr[i] && endDate>disabledArr[i]){
                console.log("Found a disabled Date in selection!");
                clearInput = true;
            }
        }
        if(clearInput){

            var today = new Date();
            $(this).data('daterangepicker').setStartDate(today);
            $(this).data('daterangepicker').setEndDate(today);

            $(this).val("").focus();

            alert("Your range selection includes disabled dates!");
        }
    });
});

$(document).on('click', '.order_for_book', function () {
    let id = $(this).val();
    let guest_count = $('#guest').val();
    let room = $('#room').val();
    let data_range = $('#busy').val();
    let start = data_range.slice(0, 10);
    let end = data_range.slice(13);
    let year = start.slice(6);
    let mount = start.slice(0, 2);
    let day = start.slice(3, 5);
    let endyear = end.slice(6);
    let endmount = end.slice(0, 2);
    let endday = end.slice(3, 5);
    let start_day = year + '-' + mount + '-' + day;
    let end_day = endyear + '-' + endmount + '-' + endday;

    let price = $('#price').val();
    var date1 = new Date(end);
    var date2 = new Date(start);
    var difference = date1.getTime() - date2.getTime();
    var days = Math.ceil(difference / (1000 * 3600 * 24));
    let total = days * price;

    $('#days').val(days);
    $('#total').val(total);
    $('#guest_count').val(guest_count);

});

$(document).on('click', '.booking', function () {


    if( $('#days').val()>0){

    let id = $(this).val();
    let guest_vount = $('#guest').val();
    let room = $('#room').val();
    let data_range = $('#busy').val();
    let start = data_range.slice(0, 10);
    let end = data_range.slice(13);
    let year = start.slice(6);
    let mount = start.slice(0, 2);
    let day = start.slice(3, 5);
    let endyear = end.slice(6);
    let endmount = end.slice(0, 2);
    let endday = end.slice(3, 5);
    let start_day = year + '-' + mount + '-' + day;
    let end_day = endyear + '-' + endmount + '-' + endday;

    let price = $('#price').val();
    var date1 = new Date(end);
    var date2 = new Date(start);
    var difference = date1.getTime() - date2.getTime();
    var days = Math.ceil(difference / (1000 * 3600 * 24));
    let total = days * price;
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': "{{csrf_token()}}",
        },
        url: '{{url('booking/room/')}}' + '/' + id,
        method: "GET",
        data: {id: id, start: start_day, end: end_day},
    }).done(function (data) {
        // alert(data.success);
        if(!alert(data.success)){window.location.reload();}
    });
    }
    else{
      SwalNotDays();
    }

});
</script>
@endif
@if($title == "rooms")
<script>

    $(document).ready(function() {
        $('.get_rooms_select_hotels').select2({
            placeholder: 'Select Hotels'
        });
    });
    let map;
    function initMap() {
        let geocoder = new google.maps.Geocoder();
        let location = "Armenia";
        geocoder.geocode({ 'address': location }, function(results, status){
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
            } else {
                alert("Could not find location: " + location);
            }
        });
        map = new google.maps.Map(document.getElementById("map-container-google-3"), {
            // center: location,
            zoom:2.5,
        });
        var hotel_markers = {!! json_encode($hotels->toArray()) !!}
            locations= hotel_markers;
        var marker, i;
        var infowindow = new google.maps.InfoWindow();
        google.maps.event.addListener(map, 'click', function() {
            infowindow.close();
        });
        for (i = 0; i <locations.length; i++) {
            let hotel_element = $('#hotel-'+locations[i].id);
            let image = hotel_element.data('image');
            let min_price = hotel_element.data('min');

            const content =
                '<div class="row">'+
                '<div  class="accomodation_item text-center" id="siteNotice">'+
                '<div class="col-md-8 " style="max-width: 100%;" >' +
                '<h5>' + locations[i].name + '</h5>' +
                ' <div class="star">' +
                ' <a  href="#"><i  class="fa fa-star"></i></a>\n' +
                ' <a href="#"><i  class="fa fa-star"></i></a>\n' +
                ' <a href="#"><i class="fa fa-star"></i></a>\n' +
                ' <a href="#"><i  class="fa fa-star"></i></a>\n' +
                ' <a href="#"><i  class="fa fa-star"></i></a>\n' +
                ' </div>' +
                '<img class="hotel_image_map"    src="'+ image+'">'
                + '<h5>' + " Min room price $" + min_price +
                '<small>/night</small>' +
                '</h5>'+
                ' </div>' +
                "</div>" +
                "</div>";
            const infowindow = new google.maps.InfoWindow({
                content: content,
            });
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i].latitude, locations[i].longitude),
                title: locations[i].name,
                map: map,
                icon: { url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"}
            });
            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    infowindow.setContent(locations[i]);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
    }
    google.maps.event.addDomListener(window, 'load', initialize);

    function myClick(id) {
        google.maps.event.trigger(markers[id], 'click');
    }
    $(document).on('click', '.cheek_room_now', function () {

        let data = $('#filters').find('input#city,input#location,input#start_date,input#end_date,select#room_type ').serialize();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}",
            },
            url: '{{route('rooms')}}',
            method: "GET",
            data: data,
        }).done(function (data) {
            $(document).ready(function() {
                $('.get_rooms_select_hotels').select2({
                    placeholder: 'Select Hotels'
                });
            });
            $('.rooms_search').html(data.rooms);

            var locations = data.get_hotels;
            // console.log(locations);
            let city = data.address;
            if(city && locations){
                initMap(city, locations);
                function initMap(city,locations) {
                    let geocoder = new google.maps.Geocoder();
                    let location = city;
                    geocoder.geocode({'address': location}, function (results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            map.setCenter(results[0].geometry.location);
                        } else {
                            alert("Could not find location: " + location);
                        }
                    });
                    map = new google.maps.Map(document.getElementById("map-container-google-3"), {
                        center: location,
                        zoom: 12.5,
                    });

                    if (locations.length>0) {
                        var marker, i;

                        var infowindow = new google.maps.InfoWindow();

                        google.maps.event.addListener(map, 'click', function() {
                            infowindow.close();
                        });
                        for (i = 0; i < locations.length; i++) {
                            let hotel_element = $('#hotel-'+locations[i].id);
                            let image = hotel_element.data('image');
                            let min_price = hotel_element.data('min');
                            // console.log(min_price);
                            const content =
                                '<div class="row">' +
                                '<div  class="accomodation_item text-center" id="siteNotice">' +
                                '<div class="col-md-8 " style="max-width: 100%;" >' +
                                '<h5>' + locations[i].name + '</h5>' +
                                ' <div class="star">' +
                                ' <a  href="#"><i  class="fa fa-star"></i></a>\n' +
                                ' <a href="#"><i  class="fa fa-star"></i></a>\n' +
                                ' <a href="#"><i class="fa fa-star"></i></a>\n' +
                                ' <a href="#"><i  class="fa fa-star"></i></a>\n' +
                                ' <a href="#"><i  class="fa fa-star"></i></a>\n' +
                                ' </div>' +
                                '<img class="hotel_image_map"    src="'+ image+'">'
                                + '<h5>' + "Min room price $" + min_price +
                                '<small>/night</small>' +
                                '</h5>'+
                                ' </div>' +
                                "</div>" +
                                "</div>";

                            const infowindow = new google.maps.InfoWindow({
                                content: content,
                            });
                            marker = new google.maps.Marker({
                                position: new google.maps.LatLng(locations[i].latitude, locations[i].longitude),
                                title: locations[i].name,
                                map: map,
                                icon: { url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"}
                            });
                            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                                return function () {
                                    infowindow.setContent(locations[i]);
                                    infowindow.open(map, marker);
                                }
                            })(marker, i));
                        }
                    }
                    else{

                        alert("Could not find Hotels in : " + location);
                    }

                    google.maps.event.addDomListener(window, 'load', initialize);

                    function myClick(id) {
                        google.maps.event.trigger(markers[id], 'click');
                    }
                }
            }

        });


    });
    $(document).on('click', '.cheek_hotel_now', function () {
        let data = $('#filter').find('select#hotel_id ').serialize();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}",
            },
            url: '{{route('rooms')}}',
            method: "GET",
            data:data,
        }).done(function (data) {
            $(document).ready(function() {
                $('.get_rooms_select_hotels').select2({
                    placeholder: 'Select Hotels'
                });
            });
            $('.rooms_search').html(data.hotel_rooms);
            var locations = data.get_hotels;
            let city = data.address;
            if(city && locations){
                initMap(city, locations);
                function initMap(city,locations) {
                    let geocoder = new google.maps.Geocoder();
                    let location = city;
                    geocoder.geocode({'address': location}, function (results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            map.setCenter(results[0].geometry.location);
                        } else {
                            alert("Could not find location: " + location);
                        }
                    });
                    map = new google.maps.Map(document.getElementById("map-container-google-3"), {
                        center: location,
                        zoom: 12.5,
                    });

                    if (locations.length>0) {
                        var marker, i;

                        var infowindow = new google.maps.InfoWindow();

                        google.maps.event.addListener(map, 'click', function() {
                            infowindow.close();
                        });
                        for (i = 0; i < locations.length; i++) {
                            let hotel_element = $('#hotel-'+locations[i].id);
                            let image = hotel_element.data('image');
                            let min_price = hotel_element.data('min');
                            // console.log(min_price);
                            const content =
                                '<div class="row">' +
                                '<div  class="accomodation_item text-center" id="siteNotice">' +
                                '<div class="col-md-8 " style="max-width: 100%;" >' +
                                '<h5>' + locations[i].name + '</h5>' +
                                ' <div class="star">' +
                                ' <a  href="#"><i  class="fa fa-star"></i></a>\n' +
                                ' <a href="#"><i  class="fa fa-star"></i></a>\n' +
                                ' <a href="#"><i class="fa fa-star"></i></a>\n' +
                                ' <a href="#"><i  class="fa fa-star"></i></a>\n' +
                                ' <a href="#"><i  class="fa fa-star"></i></a>\n' +
                                ' </div>' +
                                '<img class="hotel_image_map"    src="'+ image+'">'
                                + '<h5>' + "Min room price $" + min_price +
                                '<small>/night</small>' +
                                '</h5>'+
                                ' </div>' +
                                "</div>" +
                                "</div>";

                            const infowindow = new google.maps.InfoWindow({
                                content: content,
                            });
                            marker = new google.maps.Marker({
                                position: new google.maps.LatLng(locations[i].latitude, locations[i].longitude),
                                title: locations[i].name,
                                map: map,
                                icon: { url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"}
                            });
                            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                                return function () {
                                    infowindow.setContent(locations[i]);
                                    infowindow.open(map, marker);
                                }
                            })(marker, i));
                        }
                    }
                    else{

                        alert("Could not find Hotels in : " + location);
                    }

                    google.maps.event.addDomListener(window, 'load', initialize);

                    function myClick(id) {
                        google.maps.event.trigger(markers[id], 'click');
                    }
                }
            }

        });


    });
</script>

@endif
</body>

</html>