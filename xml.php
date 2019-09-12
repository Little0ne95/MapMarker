<?php
require_once('lib/Config.php');

header("Content-type: text/xml");

echo '<?xml version="1.0"?>
<markers>
    <marker id="2" name="A Driver" address="L32 9QP" lat="53.47729" lng="-2.88162" type="Driver" distance="26.0 km" duration="21 mins" />
    <marker id="3" name="Collection 1" address="L33 1AP" lat="53.49932" lng="-2.89371" type="Collection" distance="28.4 km" duration="25 mins" />
    <marker id="4" name="Collection 2" address="L20 6AW" lat="53.46324" lng="-2.9848" type="Exclude" distance="33.1 km" duration="29 mins" />
    <marker id="5" name="Office" address="L20 6AW" lat="53.463200" lng="-2.892725" type="Office" distance="33.1 km" duration="29 mins" />
</markers>';

?>

