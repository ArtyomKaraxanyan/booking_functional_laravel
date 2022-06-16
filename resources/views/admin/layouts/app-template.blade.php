<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Hotels </title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link href="{{ asset("/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
  {{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">--}}
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link href="{{ asset("/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css")}}" rel="stylesheet" type="text/css" />
  <link href="{{ asset("/bower_components/AdminLTE/plugins/daterangepicker/daterangepicker.css")}}" rel="stylesheet" type="text/css" />
  <link href="{{ asset("/bower_components/AdminLTE/plugins/datepicker/datepicker3.css")}}" rel="stylesheet" type="text/css" />
  <link href="{{ asset("/bower_components/AdminLTE/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link href="{{ asset("/bower_components/AdminLTE/dist/css/skins/_all-skins.min.css")}}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/app-template.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css">
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script type="text/javascript"
          src="https://maps.google.com/maps/api/js?key={{config('app.google_map_key') }}&libraries=places&language=en"></script>
  {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
  <style type="text/css">
    .pagination {
      float: right;
      margin: 0 0 5px;
    }
.invalid-feedback{
  color: #c80b0c;
}
    .hint-text {
      float: left;
      margin-top: 10px;
      font-size: 13px;
    }
    .answer{
      width: 70%;
      height: 34px;
    }

    .pointer{cursor: pointer}

     .solid {
       border-style: solid;
       color: white;
     }


  </style>
  <![endif]-->
</head>
@include('admin.layouts.sidebar')

  <body class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper">
        @include('admin.layouts.header')

        @yield('content')

            <script src="{{ asset ("/bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js") }}"></script>
        <script src="{{ asset ("/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
        <script  src="{{ asset ("/bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.js") }}" type="text/javascript" ></script>
        <script  src="{{ asset ("/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js") }}" type="text/javascript" ></script>
        <script  src="{{ asset ("/bower_components/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js") }}" type="text/javascript" ></script>
        <script  src="{{ asset ("/bower_components/AdminLTE/plugins/fastclick/fastclick.js") }}" type="text/javascript" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
        <script  src="{{ asset ("/bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.js") }}" type="text/javascript" ></script>
        <script  src="{{ asset ("/bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.date.extensions.js") }}" type="text/javascript" ></script>
        <script  src="{{ asset ("/bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.extensions.js") }}" type="text/javascript" ></script>
        <script  src="{{ asset ("/bower_components/AdminLTE/plugins/daterangepicker/daterangepicker.js") }}" type="text/javascript" ></script>
        <script  src="{{ asset ("/bower_components/AdminLTE/plugins/datepicker/bootstrap-datepicker.js") }}" type="text/javascript" ></script>
        <!-- AdminLTE App -->
        <script src="{{ asset ("/bower_components/AdminLTE/dist/js/app.min.js") }}" type="text/javascript"></script>
        <script src="{{ asset ("/bower_components/AdminLTE/dist/js/demo.js") }}" type="text/javascript"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js" type="text/javascript"></script>
        <script>


            $(document).ready(function () {
                $("#latitudeArea").addClass("d-none");
                $("#longtitudeArea").addClass("d-none");
                $("#cityArea").addClass("d-none");
                $("#countryArea").addClass("d-none");
                $("#placeArea").addClass("d-none");
                $("#strret_number").addClass("d-none");


            });
        </script>
        <script>
            // var options = {
            //     componentRestrictions: {country: "arm"}
            // };
            google.maps.event.addDomListener(window, 'load', initialize);
            function initialize() {
                var input = document.getElementById('autocomplete');
                var autocomplete = new google.maps.places.Autocomplete(input);
                autocomplete.addListener('place_changed', function () {
                    var place = autocomplete.getPlace();
                        // console.log(place.address_components);
                    var componentMap = {
                        country: 'country',
                        locality: 'locality',
                        administrative_area_level_1 : 'administrative_area_level_1',
                        route:'route',
                        strret:"street_number"
                    };
                 let street_number=place.address_components[0].types[0]==='street_number';
                     console.log(street_number);
                    for( var i = 0; i < place.address_components.length; i++) {

                        var types = place.address_components[i].types;
                        for (var j = 0; j < types.length; j++) {

                            var component_type = types[j];

                      if (street_number===false) {

                           $('#street_number').val(' ');

                      }
                            if (component_type===componentMap.strret) {

                                $('#street_number').val(place.address_components[i].long_name);

                                //console.log(place.address_components[i].long_name)
                            }


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
                    // console.log(place);
                    $('#latitude').val(place.geometry['location'].lat());
                    $('#longitude').val(place.geometry['location'].lng());
                    $("#latitudeArea").removeClass("d-none");
                    $("#longtitudeArea").removeClass("d-none");
                    $("#cityArea").removeClass("d-none");
                    $("#countryArea").removeClass("d-none");
                    $("#placeArea").removeClass("d-none");
                    $("#strret_number").removeClass("d-none");
                });
            }
        </script>

        <script>


            $(document).ready(function() {
                $('.hotels').select2({
                    placeholder: 'Select Hotels'

                });
            });

        $(document).ready(function() {

          //Date picker
          $('#birthDate').datepicker({
            autoclose: true,
            format: 'yyyy/mm/dd'
          });
          $('#hiredDate').datepicker({
            autoclose: true,
            format: 'yyyy/mm/dd'
          });
          $('#from').datepicker({
            autoclose: true,
            format: 'yyyy/mm/dd'
          });
          $('#to').datepicker({
            autoclose: true,
            format: 'yyyy/mm/dd'
          });

          $('#example2').DataTable({
              "bPaginate": false,
              "bInfo" : false
          })
          $('.selectpicker').selectpicker();




        });



  </script>
        <script src="{{ asset('js/site.js') }}"></script>
      </div>

  </body>
@include('admin.layouts.footer')

</html>
