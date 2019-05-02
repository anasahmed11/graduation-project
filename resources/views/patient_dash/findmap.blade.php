@extends('layouts.patient_dash')
@section('content')
<div class="container">
    <div class="row">
        <div id="multi-map" ></div>
    </div>
</div>
<script type="text/javascript">
    var locations=[];
        @foreach($locations as $location)
        locations.push(["{{$location->name}}",parseFloat({{$location->lat}}),parseFloat({{$location->long}}),{{$location->d_id}}]);
        @endforeach


    var map = new google.maps.Map(document.getElementById('multi-map'), {
        zoom: 7,
        center: new google.maps.LatLng(31.0409, 31.3785),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infowindow.setContent(locations[i][0]);
                infowindow.open(map, marker);
            }
        })(marker, i));
    }
</script>
@endsection
