$(document).ready(function () {
    function initMap(lat, lng, name) {

        var options = {
            zoom: 2,
            center: {lat: 45, lng: 0}
        };

        var map = new google.maps.Map(document.getElementById('map'), options);
        var marker = new google.maps.Marker({
            position: {lat: parseFloat(lat), lng: parseFloat(lng)},
            map: map

        });
        var infoWindow = new google.maps.InfoWindow({
            content: '<h3><span style="color:gray">Event Name -  </span> ' + name + '</h3>'
        });
        marker.addListener('click', function () {
            infoWindow.open(map, marker);
        });
    }

    $('#button_search').on('click', function () {

        var token = 'RSJ72NK6YXWBCMEZXXAB';
        var $events = $("#events");
        var anun_event = $('#input_search').val();
        var anun = anun_event.replace("&", "-");

        $.get('https://www.eventbriteapi.com/v3/events/search/?token=' + token + '&q=' + anun + '&expand=venue', function (res) {
            if (res.events.length) {
                var s = "<ul class='eventList'>";
                for (var i = 0; i < res.events.length; i++) {
                    var event = res.events[0];
                    console.dir(event);
                    s += "<li><a href='" + event.url + "'>" + event.name.text + "</a> - " + "</li>";
                }
                s += "</ul>";
                // $events.html(s);
            } else {
                $events.html("<p>Sorry, there are no upcoming events.</p>");
            }
                // console.log(event.venue.latitude);

            initMap(event.venue.latitude, event.venue.longitude, event.name.text)
        });

    });


});