
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
            <td><?php echo $event->startdatetime; ?></td>
            <td><?php echo $event->enddatetime; ?></td>
            <td><?php echo $event->description; ?></td>
            <td><?php echo '$'. $event->price[0]->value; 
            //Unsure how implementation of price reflects usage.
            //I wrote this by strictly following the docs
            //which is why price is an array
            ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
