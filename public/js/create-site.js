var map;
  function initMap()  {
                  var buc = {lat:44.4268 , lng: 26.1025};
                  var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 14,
                    center: buc
                  });

                    var input = document.getElementById('searchText');
                    var autocomplete = new google.maps.places.Autocomplete(input);
                    var marker = new google.maps.Marker({
                      map: map
                    });

                    autocomplete.addListener('place_changed', function() {
                    marker.setVisible(false);
                    var place = autocomplete.getPlace();
                    var placeLat = autocomplete.getPlace().geometry.location.lat();
                    var placeLng = autocomplete.getPlace().geometry.location.lng();
                    var placeLatLng = {lat:placeLat, lng:placeLng};
                    marker.setPosition(place.geometry.location);
                    marker.setVisible(true);
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);
                    var address = '';
                    if (place.address_components) {
                      address = [
                        (place.address_components[0] && place.address_components[0].long_name || ''),
                        (place.address_components[1] && place.address_components[1].long_name || ''),
                        (place.address_components[2] && place.address_components[2].long_name || '')
                      ].join(' ');
                      document.getElementById('address').value = address;
                      document.getElementById('lat').value = placeLat;
                      document.getElementById('lng').value = placeLng;
                    }
                                      
                  });

                };

