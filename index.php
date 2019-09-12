<?php
require_once('lib/Config.php');

if (isset($_GET['logout'])) {
    session_destroy();
}else{
    if (isset($_SESSION['auth']) && $_SESSION['auth'] == true) {
        header("location: calculateJourny.php");
        die();
    } else {
        $_SESSION['auth'] = false;
    }
}


?>

<!DOCTYPE html>
<html>
<head>

    <title>Carpool | Login</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/login.css">

</head>
<body>
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">

            <div class="card-body">
                <h1>360 Car Pooling</h1>
                <form id="login-form" action="calculateJourny.php" method="post" role="form">
                    <div class="input-group form-group">
                        <input type="text" class="form-control" id="username" name="username" placeholder="username" required>
                    </div>
                    <div class="input-group form-group">
                        <input type="password" id="password" name="password" class="form-control" autocomplete="current-password" placeholder="password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Login" id="login" class="btn float-right login_btn">
                    </div>
                </form>
                <div id="form-error" class="alert-danger" style="display: none;">
                    <p id="error-message"></p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</body>
</html>
