
<div id="#div_search">
    <input type="text" name="input_event" class="form-control" id="input_search" style="width: 20%;display: inline" >
    <button type="button" class="btn btn-info  aa" id="button_search"><span class="glyphicon glyphicon-search"></span> Search </button>
</div>

<div class="col-md-12  div_register">


<h3>Google Map</h3>

    <script>
        function initMap() {

            var options = {
                zoom: 3,
                center: {lat: 45, lng: 45}
            };
            var map = new google.maps.Map(document.getElementById('map'), options);

            var marker = new google.maps.Marker({
                position: {lat: 40.177200, lng: 44.503490},
                map: map
            });
            var infoWindow = new google.maps.InfoWindow({
                content: '<h1>My mark</h1>'
            });
            marker.addListener('click', function () {
                infoWindow.open(map, marker);
            });

        }
    </script>

<div id="map">



</div>



</div>
