$(function() {
	
	google.setOnLoadCallback(initialize);

      var styles = [[{
        url: '../images/people35.png',
        height: 35,
        width: 35,
        anchor: [16, 0],
        textColor: '#ff00ff',
        textSize: 10
      }, {
        url: '../images/people45.png',
        height: 45,
        width: 45,
        anchor: [24, 0],
        textColor: '#ff0000',
        textSize: 11
      }, {
        url: '../images/people55.png',
        height: 55,
        width: 55,
        anchor: [32, 0],
        textColor: '#ffffff',
        textSize: 12
      }], [{
        url: '../images/conv30.png',
        height: 27,
        width: 30,
        anchor: [3, 0],
        textColor: '#ff00ff',
        textSize: 10
      }, {
        url: '../images/conv40.png',
        height: 36,
        width: 40,
        anchor: [6, 0],
        textColor: '#ff0000',
        textSize: 11
      }, {
        url: '../images/conv50.png',
        width: 50,
        height: 45,
        anchor: [8, 0],
        textSize: 12
      }], [{
        url: '../images/heart30.png',
        height: 26,
        width: 30,
        anchor: [4, 0],
        textColor: '#ff00ff',
        textSize: 10
      }, {
        url: '../images/heart40.png',
        height: 35,
        width: 40,
        anchor: [8, 0],
        textColor: '#ff0000',
        textSize: 11
      }, {
        url: '../images/heart50.png',
        width: 50,
        height: 44,
        anchor: [12, 0],
        textSize: 12
      }]];

      var markerClusterer = null;
      var map = null;
      var imageUrl = 'http://chart.apis.google.com/chart?cht=mm&chs=24x32&' +
          'chco=FFFFFF,008CFF,000000&ext=.png';
	
	/**********************************************
	 * carte Google Maps
	 **********************************************/

	function initialize(){
		var myLatLng = new google.maps.LatLng(46.763056, 7.5);
		var mapOptions={
			zoom: 6, // 0 à 21
			center: myLatLng, // centre de la carte
			mapTypeId: google.maps.MapTypeId.ROADMAP // ROADMAP, SATELLITE, HYBRID, TERRAIN
		},
		
		map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
		
		setMarkers(map,marker); // ajoute les points 1 à 1
	}
	
	function setMarkers(map,locations){
		for(var i=0; i<locations.length; i++){
			var station = locations[i];
			var myLatLng = new google.maps.LatLng(station[0],station[1]);
			var infoWindow = new google.maps.InfoWindow();
			var marker = new google.maps.Marker ({
				position: myLatLng,
				map: map,
				title: station[2]
			});
			
			(function(i){
				google.maps.event.addListener(marker, "click", function(){
					var station = locations[i];
					infoWindow.close();
					infoWindow.setContent(
						"<div id='infoWindow'>"
							+"<p class='ville'>"+station[2]+"</p>"
							+"<p class='habitants'>"+station[3]+" Habitants</p>"
							+"Coordonnées : <br />"
							+"<p class='indent'>Latitude : "+station[0]+"</p>"
							+"<p class='indent'>Longitude : "+station[1]+"</p>"
						+"</div>"
					);
					infoWindow.open(map, this);
				});
			})(i);
		}
	}
	google.maps.event.addDomListener(window, 'load', initialize);
});