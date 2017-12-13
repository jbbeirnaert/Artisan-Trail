<!-- Person info page -->
<table border="1" cellpadding="10">
    <thead><tr><th>Name</th><th>Description</th><th>Category</th><th>Phone</th><th>Email</th><th>Social</th><tr></thead>
    <tbody>
    <?php
        //docs suggest that objects will reach the site in JSON form
        $person = json_decode(getPublicMemberInfo($_GET['member_id']));
    ?>
        <tr>
            <td><?php echo $person->name; ?></td>
            <td><?php echo $person->description; ?></td>
            <td>
            <?php
                //category is an array
                foreach($person->category as $cat){
                    echo $cat . " ";
                }
            ?>
            </td>
            <td><?php
                //phone is an optional array
                foreach($person->contact as $cont){
                    echo ($cont->phone ? $cont->phone[0] . "<br/>": " "); 
                }
            ?></td>
            <td><?php
                //email is an optional array
                foreach($person->contact as $cont){
                    echo ($cont->email ? $cont->email . "<br/>" : " "); 
                }
            ?></td>
            <td>
            <?php
                //social presumably links to specific social media accounts, not the site homepage
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