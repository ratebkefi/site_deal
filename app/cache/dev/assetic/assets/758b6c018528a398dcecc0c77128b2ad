var geocoder;
var tunis=["Tunis","Ariana","Beja","Ben Arous","Bizerte","Jendouba","El Kef","Manouba","Siliana","Zaghouan"];
var nabeul=["Nabeul"];
var sousse=["Gabes","Gafsa","Kairouan","Kasserine","Kebili","Mahdia","Medenine","Sfax","Sidi Bouzid","Sousse","Tataouine","Tozeur"];
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
}
$(document).ready(function () {
    initialize();
});
//Get the latitude and the longitude;
function successFunction(position) {
    var lat = position.coords.latitude;
    var lng = position.coords.longitude;
    codeLatLng(lat, lng)
}

function errorFunction() {

}

function initialize() {
    geocoder = new google.maps.Geocoder();
}

function codeLatLng(lat, lng) {

    var latlng = new google.maps.LatLng(lat, lng);
    geocoder.geocode({'latLng': latlng}, function (results, status) {
        if (status == google.maps.GeocoderStatus.OK) {

            if (results[1]) {
                //formatted address

                //alert(results[0].formatted_address)
                //find country name
                for (var i = 0; i < results[0].address_components.length; i++) {
                    for (var b = 0; b < results[0].address_components[i].types.length; b++) {

                        //there are different types that might hold a city admin_area_lvl_1 usually does in come cases looking for sublocality type will be more appropriate
                        if (results[0].address_components[i].types[b] == "locality") {
                            //this is the object you are looking for

                            city = results[0].address_components[i];
                            break;
                        }
                    }
                }
                //city data
                //alert(city.short_name + " " + city.long_name)

                if(jQuery.inArray( city.short_name, tunis )>=0){
                    ville='Grand tunis';
                }else if (jQuery.inArray( city.short_name, sousse )>=0){
                    ville='Sahel';
                }else if (jQuery.inArray( city.short_name, nabeul )>=0){
                    ville='Cap Bon';
                }else{
                    ville='Grand tunis';
                }
                //console.log(ville)
                $("#regiontop").val(ville);
                //console.log(ville)
                $.ajax({
                    type: "POST",
                    url: pathregion,
                    data: "name=" + ville,
                    success: function (msg) {
                        if (msg != "false") {
                            $('#shows').html(msg);
                        }
                    }
                });

            } else {

            }
        } else {

        }
    });
}