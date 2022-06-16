

$(document).ready(function() {

    $('.cities').select2({
        placeholder: 'Select City'

    });
});



$(document).on('click', '.search', function () {

    let city = $('#city').val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': "{{csrf_token()}}",
        },
        url: '/',
        method: "GET",
        data: {city: city},
    }).done(function (data) {
        $('#card').html(data.hotels);

        // let latitude = data.get_hotels.latitude;
        // let longitude = data.get_hotels.longitude;

        var locations = data.get_hotels;
        // console.log(locations);
        let city = data.address;
        initMap(city, locations);
    });

    let map;
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
            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i].latitude, locations[i].longitude),
                    title: locations[i].name,
                    map: map
                });
            }
        }else{
            alert("Could not find Hotels in : " + location);
        }
    }
});

$(document).on('click', '.view-hotel', function () {
    let hotel_id= $(this).val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': "{{csrf_token()}}",
        },
        url:'/rooms',
        method: "GET",
        data:{data:hotel_id},
    }).done(function(data) {
        $('#hotel_page').html(data);

    });

});







