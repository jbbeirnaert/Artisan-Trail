

<table border="1" cellpadding="10">
    <thead><tr><th>Name</th><th>Description</th><th>Category</th><th>Phone</th><th>Email</th><th>Social</th><tr></thead>
    <tbody>
    <?php
    //Docs suggest that API will return single events or a list of event IDs
        $person = json_decode(getPublicMemberInfo($_GET['member_id']));
    ?>
        <tr>
            <td><?php echo $person->name; ?></td>
            <td><?php echo $person->description; ?></td>
            <td>
            <?php
                foreach($person->category as $cat){
                    echo $cat . " ";
                }
            ?>
            </td>
            <td><?php
                foreach($person->contact as $cont){
                    echo ($cont->phone ? $cont->phone[0] . "<br/>": " "); 
                }
            ?></td>
            <td><?php
                foreach($person->contact as $cont){
                    echo ($cont->email ? $cont->email . "<br/>" : " "); 
                }
            ?></td>
            <td>
            <?php
                foreach($person->social as $soc){
                    echo "<a href=" . $soc->link .">";
                    echo $soc->medianame; 
                    echo "</a>";
                    echo "<br/>";
                }
            ?>
            </td>
        </tr>
    </tbody>
</table>