(function(locations, $) {

    var map = {
        el: document.getElementById('awkward-map'),
        center: new google.maps.LatLng(0, 0),
        zoom: 2,
        markers: new Array(),
        bounds: new google.maps.LatLngBounds()
    }

    var mapInstance = new google.maps.Map(map.el, {
        zoom: map.zoom,
        center: map.center,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        scrollwheel: false
    });

    // Prepare the geocoder for form submission
    var geocoder = new google.maps.Geocoder();

    var AwkwardMap = function() {

        this.markers = function(locations) {
            for(i in locations) {
                console.log(i);
            }
        };

        this.getCircleScale = function(upvoteIntensity) {
            return 'red';
        }

        this.getCircleScale = function(cityCount) {
            return Math.pow(2, cityCount) / Math.PI;
        };

        this.getCircle = function(cityCount, upvoteIntensity) {
            return {
              path: google.maps.SymbolPath.CIRCLE,
              fillOpacity: .2,
              fillColor: this.getCircleColor(upvoteIntensity),
              scale: this.getCircleScale(cityCount),
              // strokeColor: 'white',
              // strokeWeight: .5
            };
        };

        this.geocodeAddress = function(address, callback)
        {
            geocoder.geocode({'address': address}, callback);
        };

        this.setMarkers = function(theMap)
        {
            if(locations.length) {
                for(i in locations) {

                    //console.log(locations[i].city);
                    this.geocodeAddress(locations[i].city, function(coords) {
                        // console.log(coords[0]);

                        console.log(coords[0].geometry.location.lat());
                        console.log(coords[0].geometry.location.lng());

                        var marker,
                            latLng = new google.maps.LatLng(
                                coords[0].geometry.location.lat(),
                                coords[0].geometry.location.lng()
                            );



                        marker = new google.maps.Marker({
                            position: latLng,
                            title: locations[i].city,
                            map: mapInstance//,
                            //icon: map.mapMarkerIcon
                        });

                        map.markers.push(marker);

                        map.bounds.extend(latLng);
                    });

                }
            }
        };
    }

    var awkwardMap = new AwkwardMap();

    awkwardMap.setMarkers(locations);

})(locations, jQuery);
