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

    map.fuckingMap = mapInstance;

    var AwkwardMap = function() {

        this.markers = function(locations) {
            for(i in locations) {
                console.log(i);
            }
        };

        this.getCircleColor = function(upvoteIntensity) {
            return 'red';
        }

        this.getCircleScale = function(cityCount) {
            return Math.pow(2, cityCount) / Math.PI;
        };

        this.getCircle = function(cityCount) {
            return {
              path: google.maps.SymbolPath.CIRCLE,
              fillOpacity: .2,
              fillColor: 'red',
              scale: cityCount * 10,
              strokeColor: 'white',
              strokeWeight: .5
            };
        };

        this.geocodeAddress = function(address, callback)
        {
            geocoder.geocode({'address': address}, callback);
        };

        this.setMarkers = function(theMap)
        {
            var self = this;

            if(locations.length) {
                for(i in locations) {

                    //console.log(locations[i].city);
                    this.geocodeAddress(locations[i].city, function(coords) {
                        // console.log(coords[0]);
                        //
                        var marker,
                            latLng = new google.maps.LatLng(
                                coords[0].geometry.location.lat(),
                                coords[0].geometry.location.lng()
                            );

                        marker = new google.maps.Marker({
                            position: latLng,
                            title: locations[i].city,
                            map: mapInstance,
                            icon: self.getCircle(locations[i].count)
                        });

                        map.markers.push(marker);

                        map.bounds.extend(latLng);
                    });

                }

                //map.fuckingMap.fitBounds(map.bounds);
            }
        };
    }

    var awkwardMap = new AwkwardMap();

    awkwardMap.setMarkers(locations);

})(locations, jQuery);
