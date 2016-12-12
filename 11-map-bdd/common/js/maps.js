$(function() {

	/**********************************************
	 * carte Google Maps
	 **********************************************/

	function initialize(){
			var myLatLng = new google.maps.LatLng(43.604482, 1.443962);
			var mapOptions={
				zoom: 12,
				center: myLatLng
			},
			map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
			setMarkers(map,marker);
	}
	
	function setMarkers(map,locations){
		for(var i=0; i<locations.length; i++){
			var station = locations[i];
			var myLatLng = new google.maps.LatLng(station['marker_latitude'], station['marker_longitude']);
			var infoWindow = new google.maps.InfoWindow();
			var image = 'common/images/marker-map/'+station['icone_icon']+'.png';
			
			var marker = new google.maps.Marker({
				position: myLatLng,
				map: map,
				icon: image,
				title: station['marker_ville']
			});
			
			(function(i){
				google.maps.event.addListener(marker, "click",function(){
					var station = locations[i];
					infoWindow.close();
					infoWindow.setContent(
						"<div id='infoWindow'>"
						+"<p class='texte'>"+station['marker_text']+"<p>"
						+"</div>"
					);
					infoWindow.open(map,this);
				});
			})(i);
		}
	}
	google.maps.event.addDomListener(window, 'load', initialize);
});