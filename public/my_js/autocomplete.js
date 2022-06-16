


$(document).ready(function () {
    $("#latitudeArea").addClass("d-none");
    $("#longtitudeArea").addClass("d-none");
    $("#cityArea").addClass("d-none");
    $("#countryArea").addClass("d-none");
    $("#placeArea").addClass("d-none");
});


// var options = {
//     componentRestrictions: {country: "arm"}
// };

google.maps.event.addDomListener(window, 'load', initialize);

function initialize() {
    var options = {

        types: ['(cities)'],

    };
    var input = document.getElementById('location');
    var autocomplete = new google.maps.places.Autocomplete(input,options);
    autocomplete.addListener('place_changed', function () {
        var place = autocomplete.getPlace();
        // console.log(place);
        var componentMap = {
            country: 'country',
            locality: 'locality',
            administrative_area_level_1 : 'administrative_area_level_1',
            route:'route'
        };

        for(var i = 0; i < place.address_components.length; i++) {

            var types = place.address_components[i].types;

            for (var j = 0; j < types.length; j++) {

                var component_type = types[j];

                if (component_type===componentMap.locality) {
                    $('#city').val(place.address_components[i].long_name);
                    //console.log(place.address_components[i].long_name)
                }
                if (component_type===componentMap.country) {
                    $('#country').val(place.address_components[i].long_name);

                }

                if (component_type===componentMap.route) {

                    $('#place').val(place.address_components[i].long_name);

                }
            }
        }


        //$("#city").val('');
    });
}
