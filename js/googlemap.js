var car = 'images/car.png';
var person = 'images/person.png';
var excluded = 'images/excluded.png';
var meeting = 'images/meetingpoint.png';
var excludedMarker = [];
var driverMarker = [];
var collectionMarker = [];
var meetingPointMarker = [];
var map;
var customLabel = {
  Collection: {
    // label: {text: 'C'},
    icon: person,
  },
  Driver: {
    // label: {text: 'D'},
    icon: car,
  },
  Exclude: {
    icon: excluded,
  },
  MeetingPoint: {
    icon: meeting,
  },

};

function initMap() {
  var directionsService = new google.maps.DirectionsService();
  var directionsRenderer = new google.maps.DirectionsRenderer();
  map = new google.maps.Map(document.getElementById('map'), {
    center: new google.maps.LatLng(53.411545, -2.634039),
    zoom: 10,
  });
  var infoWindow = new google.maps.InfoWindow;
  directionsRenderer.setMap(map);

  document.getElementById('submit').addEventListener('click', function() {
    calculateAndDisplayRoute(directionsService, directionsRenderer);
  });

  downloadUrl('xml.php', function(data) {
    var xml = data.responseXML;
    var markers = xml.documentElement.getElementsByTagName('marker');
    Array.prototype.forEach.call(markers, function(markerElem) {
      var id = markerElem.getAttribute('id');
      var name = markerElem.getAttribute('name');
      var address = markerElem.getAttribute('address');
      var distance = markerElem.getAttribute('distance');
      var duration = markerElem.getAttribute('duration');
      var type = markerElem.getAttribute('type');
      var point = new google.maps.LatLng(
          parseFloat(markerElem.getAttribute('lat')),
          parseFloat(markerElem.getAttribute('lng')));

      if (name === 'Office') {
        var infowincontent = document.createElement('div');
        var strong = document.createElement('strong');
        strong.textContent = 'Office';
        infowincontent.appendChild(strong);
        var officePoint = point;
      } else {
        var infowincontent = document.createElement('div');
        var strong = document.createElement('strong');
        strong.textContent = name;
        infowincontent.appendChild(strong);
        infowincontent.appendChild(document.createElement('br'));
        var addDistance = document.createElement('text');
        addDistance.textContent = 'Distance: ' + distance;
        infowincontent.appendChild(addDistance);
        infowincontent.appendChild(document.createElement('br'));
        var addDuration = document.createElement('text');
        addDuration.textContent = 'Duration: ' + duration;
        infowincontent.appendChild(addDuration);
      }

      var icon = customLabel[type] || {};

      var marker = new google.maps.Marker({
        map: map,
        position: point,
        label: icon.label,
        icon: icon.icon,
      });

      if (type === 'Exclude') {
        excludedMarker.push(marker);
      }
      if (type === 'Driver') {
        driverMarker.push(marker);
      }

      if (type === 'Collection') {
        collectionMarker.push(marker);
      }
      if (type === 'MeetingPoint') {
        meetingPointMarker.push(marker);
      }

      marker.addListener('mouseout', function() {
        infoWindow.setContent(infowincontent);
        infoWindow.open(map, marker);
      });

      marker.addListener('click', function() {
        setpeople(id, type);
      });

    });
    // hide excluded people
    $('.buttonExcluded').trigger( "click" );

  });


}

function calculateAndDisplayRoute(directionsService, directionsRenderer) {
  var waypts = [];
  var checkboxArray = document.getElementById('personA');

  if(document.getElementById('driver').value === ''){
    $('.selectDriver').css('display','block');
  }else{
    $('.selectDriver').css('display','none');
    for (var i = 0; i < checkboxArray.length; i++) {
      if (checkboxArray.options[i].selected) {
        waypts.push({
          location: checkboxArray[i].value,
          stopover: true,
        });
      }
    }
    directionsService.route({
      origin: document.getElementById('driver').value,
      destination: '53.463200,-2.892725',
      waypoints: waypts,
      optimizeWaypoints: true,
      travelMode: 'DRIVING',
    }, function(response, status) {
      if (status === 'OK') {
        directionsRenderer.setDirections(response);
        var route = response.routes[0];
        var summaryPanel = document.getElementById('directions-panel');
        console.log(response);
        summaryPanel.innerHTML = '';
        // For each route, display summary information.
        timeRunningTotal = 0;
        distanceRunningTotal = 0;
        for (var i = 0; i < route.legs.length; i++) {

          timeRunningTotal = timeRunningTotal + parseInt(route.legs[i].distance.text);
          distanceRunningTotal = distanceRunningTotal + parseInt(route.legs[i].duration.text);


          var routeSegment = i + 1;
          summaryPanel.innerHTML += '<b>Route Segment: ' + routeSegment +
              '</b><br>';
          summaryPanel.innerHTML += route.legs[i].start_address + ' to ';
          summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
          summaryPanel.innerHTML += route.legs[i].distance.text + ' | ';
          summaryPanel.innerHTML += route.legs[i].duration.text + '<br><br>';
        }

        summaryPanel.innerHTML += '<b>Total Distance: ' + distanceRunningTotal + ' Km </b><br>';
        summaryPanel.innerHTML += '<b>Total Time: ' + timeRunningTotal + ' mins</b><br>';
        $('#directions-panel').css('display', 'block');
      } else {
        window.alert('Directions request failed due to ' + status);
      }
    });
  }


}

function removeMarkers(type) {
  console.log(type);
  for (i = 0; i < type.length; i++) {
    if (type[i].getMap() != null) type[i].setMap(null);
    else type[i].setMap(map);
  }
}

function setpeople(id, type) {
  console.log($('#personA option:selected').length);

  if ($('#personA  option:selected').length >= 2) {
    $('#personA > option').each(function() {
      $(this).prop('selected', false);
    });
    console.log($('#personA option:selected').length);
  }

  $('#mapMarker option[id*=' + id + ']').
      prop('selected', true).
      trigger('change');

  console.log(id);
  if (type === 'Driver') {
    $('#personA > option').each(function() {
      $(this).prop('disabled', false);
    });

    $('#driver option[id*=' + id + ']').prop('selected', true);

    $('#personA option[id*=' + id + ']').prop('disabled', true);
  }
  if (type === 'Collection') {
    $('#personA option[id*=' + id + ']').prop('selected', true);
  }

}

function downloadUrl(url, callback) {
  var request = window.ActiveXObject ?
      new ActiveXObject('Microsoft.XMLHTTP') :
      new XMLHttpRequest;

  request.onreadystatechange = function() {
    if (request.readyState == 4) {
      request.onreadystatechange = doNothing;
      callback(request, request.status);
    }
  };

  request.open('GET', url, true);
  request.send(null);
}

function doNothing() {
}

var last_valid_selection = null;

$('#personA').change(function(event) {

  if ($(this).val().length > 2) {

    $(this).val(last_valid_selection);
  } else {
    last_valid_selection = $(this).val();
  }
});

