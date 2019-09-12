<?php
require_once('lib/Config.php');

?>
<!DOCTYPE html >
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Carpool | Calculate Journey </title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css"/>
</head>

<html>
<body>
<div class="container-fluid" style="height: 100%">
    <div class="row" style="height: 100%">

        <div class="col-12 col-md-6 order-12 order-md-1 map-height-mobile" >
            <div id="map"></div>
            <?php include('includes/footer.php') ?>
        </div>
        <div class="col-12 col-md-6 order-1 order-md-12">
            <?php include('includes/navbar.php'); ?>

            <div class="usercard"></div>
            <br>
            <h2>Calculate a Journey</h2>
            <br>
            <form>
                <div class="form-group">
                    <label for="driver">Select a Driver:
                        <small><br>CLICK A DRIVER ON THE MAP FOR QUICK SELECT</small>
                    </label>
                    <select class="form-control" id="driver" required>
                        <option value="" disabled selected>Please Select</option>
                       <option id="2" value="53.47729,-2.88162">A Driver</option>'
                    </select>
                    <div class="alert alert-danger selectDriver">Please select a driver</div>
                    <br>
                    <label for="personA">Select Passengers:
                        <small><br>CLICK A PASSENGER ON THE MAP FOR QUICK SELECT</small>
                    </label>
                    <select multiple class="form-control" id="personA" required>
                       <option id="3" value="53.49932,-2.89371">Collection 1</option>
                    </select>

                    <br>
                </div>
            </form>
            <input class="btn btn-primary" type="submit" id="submit">
            <div id="directions-panel"></div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>


<script src="js/googlemap.js"></script>

<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=<?php echo Config::read('api.key') ?>&callback=initMap">
</script>


<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

</body>
</html>