$(function()
{
   $('#map').gMap();
   
   $('#map_controls').gMap(
   {
        latitude: 19.6907925,
        longitude: -101.19982,
        maptype: 'TERRAIN', // 'HYBRID', 'SATELLITE', 'ROADMAP' or 'TERRAIN'
        zoom: 10,
        controls: {
            panControl: true,
            zoomControl: false,
            mapTypeControl: true,
            scaleControl: false,
            streetViewControl: false,
            overviewMapControl: false
        }
   });
   
   $('#map_addresses').gMap({
        address: " Nicolás Bravo, Felícitas del Río, 58040 Morelia, Mich., México",
        zoom: 10,
		markers:[
			{
			latitude: 19.6907925,
			longitude: -101.19982,
			html: "Intalaciones Eduardo " 
			},
			{
				address: "Nicolás Bravo, Felícitas del Río, 58040",
				html: "",
				popup: false
			},
			{
				address: " Nicolás Bravo, Felícitas del Río, 58040",
				html: ""
			}
		]
    });

	$("#map_extended").gMap({
		controls: false,
		scrollwheel: true,
		maptype: 'TERRAIN',
		/*markers: [
			{
				latitude: 19.6907925,
				longitude: -101.19982,
				icon: {
					image: "images/gmap_pin_orange.png",
					iconsize: [26, 46],
					iconanchor: [12,46]
				}
			},
	        {
				latitude: 19.6907925,
				longitude: -101.19973900000002,
			},
			{
				latitude: 19.6907925,
				longitude: -101.19973900000002,
				icon: {
					image: "images/gmap_pin_gray.png",
					iconsize: [26, 46],
					iconanchor: [12,46]
				}
			}
		],*/
		icon: {
			image: "images/gmap_pin.png", 
			iconsize: [26, 46],
			iconanchor: [12, 46]
		},
		latitude: 19.6907925,
		longitude: -101.19982,
		zoom: 10
	});
	
	// Detect user location
	if(navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position)
		{
			$('#map_controls').gMap('addMarker', {
				latitude: position.coords.latitude,
				longitude: position.coords.longitude,
				content: 'You are here!',
				icon: {
					image: "images/gmap_pin.png", 
					iconsize: [26, 46],
					iconanchor: [12, 46]
				},
				popup: true
			});
			$('#map_controls').gMap('centerAt', {
				latitude: position.coords.latitude,
				longitude: position.coords.longitude,
				zoom: 8
			});
		}, function()
		{
			//console.log('Couldn\'t find you :(');
		});
	}
});