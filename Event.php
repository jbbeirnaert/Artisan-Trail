<!DOCTYPE html>
<html>
    <head></head>
<body>
    <?php include('../dummyData.php'); ?>
    
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
            <td><?php echo $event->startdatetime; ?></td>
            <td><?php echo $event->enddatetime; ?></td>
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

</body>
</html>