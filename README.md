# Google Map Markers

Map Markers, the perfect way of plotting all your locations on a map, then calculating the distance from a, to b then finally getting to c. In other words, carpooling 101. 

## Getting Started

### Prerequisites

Follow this link to get your Google API key

https://developers.google.com/maps/documentation/javascript/get-api-key

Once you have your key you will need the following API's enabled:-
- Directions API
- Distance Matrix API
- Maps JavaScript API

### Installing

1. Get your Google API key
2. In Config.php file

```
Config::write('api.key', 'GOOGLE_API_KEY');
```
3. In '''googlempap.js''' replace office location with the lat and lng of your office location in the format of '''1.22, -091.00'''

```
  destination: 'OFFICE LOCATION',
```
4. Adding your map markers
You can add your map markers into the xml.php file in the following format.
``` <marker id="5" name="Office" address="L20 6AW" lat="53.463200" lng="-2.892725" type="Office" distance="33.1 km" duration="29 mins" /> ```
Once you have added it to the xml.php the marker should show on your map.
You then need to either add it to the drive drop-down or the collection drop-down to be able to select it.

## Pro Version
What's included?
MySQL database schemer
Dynamic filling option boxes from the database for both drivers and collection points.
Extra pages for adding, updating and deleting markers.
Allowing for more than two points to be selected
Fully working log in
For more information please email on rachelshepherd@outlook.com



