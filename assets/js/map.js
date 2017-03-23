var map;
jQuery(document).ready(function(){

    map = new GMaps({
        div: '#map',
        lat: 51.5324807,
        lng: -0.1125814,
    });
    map.addMarker({
        lat: 51.5324807,
        lng: -0.1125814,
        title: 'Address',      
        infoWindow: {
            content: '<h5 class="title">Lift</h5><p><span class="region">45 White Lion Street</span><br><span class="postal-code">N1 9PW</span><br><span class="country-name">UK</span></p>'
        }
        
    });

});