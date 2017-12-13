<?php

if(isset($_SESSION['id']))
{
    echo '<div id="addFormEvent">';
    echo '<button id="createFormEvent">add Event</button>';
    echo '</div>';
}

?>


<table border="1" cellpadding="10">
    <thead><tr><th>Name</th><th>Host</th><th>Location</th><th>Start</th><th>End</th><th>Description</th><th>Price</th></tr></thead>
    <tbody>
    <?php
    //Docs suggest that API will return single events or a list of event IDs
    $eventIds = json_decode(getEventList(), true);
    foreach($eventIds['eventlist'] as $key): 
        $event = json_decode(getEvent($key));
        $eventLink = "?action=Event&event_id=".$event->eventid;
        $personLink = "?action=Person&member_id=".$event->hostid;
    ?>
        <tr>
            <td><?php 
            echo "<a href='$eventLink'>";
            echo $event->name; 
            echo "</a>";
            ?></td>
            <td><?php 
            echo "<a href='$personLink'>";
            echo $event->hostname; 
            echo "</a>";
            ?></td>
            <td><?php echo $event->location->address->name; ?></td>
            <td><?php echo date("jS F, Y", $event->startdatetime); ?></td>
            <td><?php echo date("jS F, Y", $event->enddatetime); ?></td>
            <td><?php echo $event->description; ?></td>
            <td><?php echo '$'. $event->price[0]->value; 
            //Unsure how implementation of price reflects usage.
            //I wrote this by strictly following the docs
            //which is why price is an array
            ?></td>
        </tr>
    <?php
    endforeach;
    if(isset($_POST['name']))
    {
        createNewEvent(null, null, $_POST['name'], null, null, null, null, null, $_POST['location'], $_POST['longitude'], $_POST['latitude'], null, null, null, strtotime($_POST['start']), strtotime($_POST['end']), $_POST['description'], null, null, $_POST['price']);
        echo '<tr>';
        echo "<td>".$_POST['name']."</td>";
        echo "<td>".GetUserNameFromId($_SESSION['id'])."</td>";
        echo "<td>".$_POST['location']."</td>";
        $dateStart = new DateTime($_POST['start']);
        $dateEnd = new DateTime($_POST['end']);
        echo "<td>".$dateStart->format("jS F, Y")."</td>";
        echo "<td>".$dateEnd->format("jS F, Y")."</td>";
        echo "<td>".$_POST['description']."</td>";
        echo "<td>$".$_POST['price']."</td>";

        echo '</tr>';
    }
    ?>
    </tbody>
</table>



<script type="text/javascript">
    
    $(document).ready(function(){

        $("#createFormEvent").click(function(){
           $("#addFormEvent").html('<form action="" method="post" style="margin-top: 5em"><div><label for="name">Name: </label><input type="text" name="name" required="required"/></div><div><label for="location">Location: </label><input type="text" name="location" required="required"/></div><div><label for="start">Start: </label><input type="date" name="start" required="required"/></div><div><label for="end">End: </label><input type="date" name="end" required="required"/></div><div><label for="longitude">Longitude: </label><input type="number" name="longitude" required="required"/></div><div><label for="latitude">Latitude: </label><input type="number" name="latitude" required="required"/></div><div><label for="description">Description: </label><input type="text" name="description" required="required"/></div><div><label for="price">Price: $</label><input type="number" name="price" required="required"/></div><div><input id="submitCreateEvent" type="submit" value="Submit" /></div></form>');
           
        });
        
        
    });

</script>
