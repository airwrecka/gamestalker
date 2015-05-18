$(document).ready(function(){
	/*****	GOOGLE MAPS INITIALIZATION	*****/
	var map;
	var markers = new Array();
	var marker_1 = 0;
	var initialize = function(){
		var mapOptions = {
		zoom: 15,
		center: new google.maps.LatLng(10.369, 123.917)
		};
	 
		map = new google.maps.Map(document.getElementById('map-container'), mapOptions);
	};
	
	var setmarkers = function (n){
		for (var i = 0; i < markers.length; i++) 
		{
	    	markers[i].setMap(n);
		}
	}
	/*****	END INITIALIZATION	*****/
	/*****	START MAP MODULE	*****/
	$('.checkbox-name').click(function(){
		var num = new Array();
		
		$('.checkbox-name').each(function(){
			if($(this).is(':checked'))
			{
				num.push($(this).val());
			}
		});
		
		$.post('map/addmarker', {inctype: num}, function(data){
			data = JSON.parse(data);
			
			setmarkers(null);
			if(data['error'] == 0)
			{
				var i = 1;
				for(var x in data['info'])
				{
					for(var y in data['info'][x])
					{
						var lat = data['info'][x][y]['location_latitude'];
						var lon = data['info'][x][y]['location_longitude'];
						var myLatLng = new google.maps.LatLng(lat, lon);
						var marker = new google.maps.Marker({
							position: myLatLng,
							map: map,
							title: 'sample',
							zIndex: i++
						});
						markers.push(marker);
					}
				}
			}
		});
	});
	/*****	END MAP MODULE	*****/
	/*****	END GLOBAL MODULE	*****/
	$('.map-container-add').click(function(){
		google.maps.event.addListener(map, 'click', function(event) {
			if(marker_1 == 0)
			{		
				lat = event.latLng.lat();
				lng = event.latLng.lng();
				var marker = new google.maps.Marker({
					position: event.latLng,
					draggable: true,
					map: map
				});
				marker_1 = 1;
				document.getElementById('lat').value = lat;
				document.getElementById('long').value = lng;
				
				google.maps.event.addListener(marker, 'dragend', function(marker){
					var latlong = marker.latLng;
					document.getElementById('lat').value = latlong.lat();
					document.getElementById('long').value = latlong.lng();
				});

			}
		});
	});
	/*****	END GLOBAL MODULE	*****/
	
	google.maps.event.addDomListener(window, 'load', initialize);
});