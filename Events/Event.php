<!-- Give more detail of the event, and show on the map where it is ! -->

<table border="1" cellpadding="10">
    <thead><tr><th>Name</th><th>Host</th><th>Location</th><th>Start</th><th>End</th><th>Age Range</th><th>Description</th><th>Price</th><th>Categories</th></tr></thead>
    <tbody>
    <?php
    //Docs suggest that API will return single events or a list of event IDs
        $event = json_decode(getEvent($_GET['event_id']));
    ?>
        <tr>
            <td><?php echo $event->name; ?></td>
            <td><?php echo $event->hostname; ?></td>
            <td><?php echo $event->location->address->name; ?></td>
            <td><?php echo date("jS F, Y", $event->startdatetime); ?></td>
            <td><?php echo date("jS F, Y", $event->enddatetime); ?></td>
            <td><?php echo $event->agefrom .' - '. $event->ageto; ?></td>
            <td><?php echo $event->description; ?></td>
            <td><?php echo '$'. $event->price[0]->value;
            //Unsure how implementation of price reflects usage.
            //I wrote this by strictly following the docs
            //which is why price is an array
            ?></td>
            <td>
            <?php
                foreach($event->category as $cat){
                    echo $cat . " ";
                }
            ?>
            </td>
        </tr>
    </tbody>
</table>

<!-- We show on the map where it is ! -->
<div id="googleMap" style="width:50%;height:400px;"></div>
<script>
      function initMap() {
        var uluru = {lat: <?php Print($event->location->latitude) ?>, lng: <?php Print($event->location->longitude) ?>};
        var map = new google.maps.Map(document.getElementById('googleMap'), {
          zoom: 15,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxzh5So7f1MobbJBeEnohTYAWdjEq8cYs&callback=initMap"></script>
