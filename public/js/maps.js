function initMap() {
    const mapOptions = {
        center: { lat: 40.7128, lng: -74.0060 },
        zoom: 14,
    };

    const map = new google.maps.Map(document.getElementById('map'), mapOptions);

    const marker = new google.maps.Marker({
        position: { lat: 40.7128, lng: -74.0060 },
        map: map,
        title: 'Местоположение',
    });

    const infoWindow = new google.maps.InfoWindow({
        content: 'Привет, это местоположение!',
    });

    marker.addListener('click', function() {
        infoWindow.open(map, marker);
    });
}
google.maps.event.addDomListener(window, 'load', initMap);
