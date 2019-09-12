<footer class="footer" style="padding: 13px;
    bottom: 0px;
    position: absolute;
    background: white;
">
    <div class="container">
        <span class="text-muted">Map Options</span><br>
        <input class="buttonExcluded" type="button" value="Toggle Excluded" onClick="removeMarkers(excludedMarker)"/>
        <input class="buttonDriver" type="button" value="Toggle Drivers" onClick="removeMarkers(driverMarker)"/>
        <input class="buttonCollection" type="button" value="Toggle Collection" onClick="removeMarkers(collectionMarker)"/>
        <input class="buttonMeetingPoint" type="button" value="Toggle Meeting Points" onClick="removeMarkers(meetingPointMarker)"/>
    </div>
</footer>